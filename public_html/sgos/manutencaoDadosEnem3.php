<?php
set_time_limit(0);

class manutencao{

    public $dadosModulo;
    public $dadosCandidatos;

    function conectar(){
        // Conectando a base teste
        if(mssql_connect('192.168.1.149', 'webuserac', 'ocvuosqlserver')==false)
			die(mssql_get_last_message()."<br>Não foi possível conectar ao banco de dados! 1");

        // Selecionando o banco de dados
        if(mssql_select_db('ACWEB')==false)
            die(mssql_get_last_message()."<br>Não foi possível conectar ao banco de dados! 2");
    }

    function executeQuery($sql){
        $result = mssql_query($sql);
        if($result == false)
           die(mssql_get_last_message(). " <br>".$sql);

        return $result;
    }

    function queryFetch($query){

        $result = $this->executeQuery($query);

        return mssql_fetch_object($result);

    }

    function queryFetchAllArray($query){
        $result = $this->executeQuery($query);

        while($array = mssql_fetch_array($result))
            $arrayDeArrays[] = $array;

        return $arrayDeArrays;
    }

    function queryFetchAll($query){

        $result = $this->executeQuery($query);

        while($objeto = mssql_fetch_object($result))
            $arrayObjetos[] = $objeto;


        return $arrayObjetos;

    }

    function getUrlNotaCandidato($numeroInscricao){
        $linkNota = str_replace("&modulo=".$dadosModulo->numero_modulo, '', $dadosModulo->link);
        return $linkNota."print&item=".$numeroInscricao."&layout=print";
    }

    function getNomeCandidato($output){
        preg_match_all("/<tr ><td  align=(.)+left(.)+ >[a-zA-Z'. ]*/i", $output, $matchs);
        return substr($matchs[0][0], 24);
    }
    
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	
	
    function execute($idModulo){
		$time_start =$this->microtime_float();
        $this->conectar();
		
		
        $arrayLetras = range('A', 'Z');
		
		$sql = "SELECT TOP 10 moduloAluno.* , aluno.numero_inscricao
					FROM pism_modulo_aluno moduloAluno, pism_aluno aluno 
					WHERE moduloAluno.id_modulo = ".$idModulo." AND moduloAluno.carregado = 'S' 
						AND moduloAluno.id_aluno = aluno.id";
        

        $this->dadosModulo = $this->queryFetchAll($sql);


        if(!$this->dadosModulo)
            die('Não foi possível obter os dados do trienio ou não há módulo cadastrado para o triênio!');
		
		foreach($this->dadosModulo as $dadosModulo){
			$ch = curl_init($dadosModulo->link);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			
			
			
			// Obtem os nomes dos modulos
			preg_match_all('/M.dulo [a-zA-Z\ -]*/i', $output, $matchs);		
			foreach($matchs[0] as $nomeModulo){
				
				$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'];

				// Obtem os nomes das disciplinas
				preg_match_all("/>[a-zA-Z]{3}</i", $output, $matchs);
				
				foreach($matchs[0] AS $nomeDisciplina){
					$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][substr($nomeDisciplina, 1, 3)] = array('notaDiscursiva'=>array(), 'notaObjetiva'=>array());
					$arrayDisciplinas[] = substr($nomeDisciplina, 1, 3);
				}
			}

			// Obtendo a nota ponderada
			preg_match_all('/:bold">[ 0-9]{0,3}[.]?[0-9]{0,2}[*]{0,6}</i', $output, $matchs);
			foreach($matchs[0] as $notaPonderada){
				$this->dadosCandidatos[$dadosModulo->numero_inscricao]['notaPonderada'] = trim(str_replace('<', '', str_replace(':bold">', '', $notaPonderada)));
			}
			
			// Obtendo as notas nas disciplinas
			preg_match_all('/<td  align="right" >[0-9]{0,2}[.]?[0-9]{0,2}[*]{0,6}<\/td>/i', $output, $matchs);
			//var_dumP($matchs);exit;
			$totalDisciplinas = count($this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas']);
			$quantidadeModulos = count($this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos']);
			$tipoProva = 'notaDiscursiva';
			foreach(array_keys($this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos']) as $nomeModulo){
				$contadorDisciplinas = 0;
				$totalNotasAtribuidas = 0;
				// Separando as notas por módulos
				foreach($matchs[0] AS $idx=>$nota){
					// Primeiro vem a nota discursiva
					// Depois vem a nota objetiva
					if($contadorDisciplinas == $totalDisciplinas){
						$tipoProva = $tipoProva == 'notaDiscursiva' ? 'notaObjetiva' : 'notaDiscursiva';
						$totalNotasAtribuidas += $contadorDisciplinas;
						$contadorDisciplinas = 1;
					}
					else{
						$contadorDisciplinas++;
					}
					if($totalNotasAtribuidas == $totalDisciplinas*2){
						break;
					}

					$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][$arrayDisciplinas[$contadorDisciplinas-1]][$tipoProva] = trim(str_replace('</td>', '', str_replace('<td  align="right" >', '', $nota)));
					unset($matchs[0][$idx]);
				}
			}
		}
		
	
		$idxModulo = 0;
		foreach($this->dadosCandidatos as $dadosCandidato){
			$sql = "UPDATE pism_modulo_aluno SET carregado = 'X', nota_pond='".$dadosCandidato['notaPonderada']."' WHERE id = ".$this->dadosModulo[$idxModulo]->id;
			$this->executeQuery($sql);
				
			$idxModulo++;
		}
		
		$time_end = $this->microtime_float();
		$time = $time_end - $time_start;

		echo "Did nothing in $time seconds\n";
    }
	
	

}




$classe = new manutencao();
$classe->execute(1, null, null, 1);
?>

<html>
	<head>
		<META HTTP-EQUIV="Refresh" CONTENT=";URL=http://localhost/manutencaoDadosEnem3.php">
	</head>
	
	<body>
		<?php echo count($classe->dadosModulo); ?>
	</body>	
</html>

