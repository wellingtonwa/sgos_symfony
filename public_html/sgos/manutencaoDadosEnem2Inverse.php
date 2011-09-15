<?php
set_time_limit(0);

class manutencao{

    public $dadosModulo;
    public $dadosCandidatos;
	public $conn;

    function conectar(){
        $this->conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=192.168.1.150;Database=ACAprod1;", 'webuserac', 'ocvuosqlserver');
		IF($this->conn == false)
			DIE('não deu');
			
    }

    function executeQuery($sql){
        $result = odbc_exec($this->conn, $sql);
        if($result == false)
           die(odbc_errormsg(). " <br>".$sql);

        return $result;
    }

    function queryFetch($query){

        $result = $this->executeQuery($query);

        return odbc_fetch_object($result);

    }

    function queryFetchAllArray($query){
        $result = $this->executeQuery($query);

        while($array = odbc_fetch_array($result))
            $arrayDeArrays[] = $array;

        return $arrayDeArrays;
    }

    function queryFetchAll($query){

        $result = $this->executeQuery($query);

        while($objeto = odbc_fetch_object($result))
            $arrayObjetos[] = $objeto;


        return $arrayObjetos;

    }

    function getUrlNotaCandidato($numeroInscricao){
        $linkNota = str_replace("&modulo=".$this->dadosModulo->numero_modulo, '', $this->dadosModulo->link);
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
		
		
        //$arrayLetras = range('A', 'Z');
		
		$sql = "SELECT TOP 10 moduloAluno.* , aluno.numero_inscricao
					FROM pism_modulo_aluno moduloAluno, pism_aluno aluno 
					WHERE moduloAluno.id_modulo = ".$idModulo." AND moduloAluno.carregado = 'N' 
						AND moduloAluno.id_aluno = aluno.id
					ORDER BY moduloAluno.id DESC";
        

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
				preg_match_all("/>(&nbsp;){0,2}[a-zA-Z]{3}</i", $output, $matchs);
				foreach($matchs[0] AS $nomeDisciplina){
					preg_match_all("/[A-Z]{1}[a-z]{2}/", $nomeDisciplina, $matchDisciplina);
					$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][$matchDisciplina[0][0]] = array('notaDiscursiva'=>array(), 'notaObjetiva'=>array(), 'notaDiscursivaNum'=>array(), 'notaObjetivaNum'=>array());
					$arrayDisciplinas[] = $matchDisciplina[0][0];
				}
			}

			// Obtendo a nota ponderada
			preg_match_all('/:bold">[ ]{0,2}[0-9]{0,3}[,.]?[0-9]{0,2}[*]{0,6}</i', $output, $matchs);
			foreach($matchs[0] as $notaPonderada){
				$this->dadosCandidatos[$dadosModulo->numero_inscricao]['notaPonderada'] = trim(str_replace('<', '', str_replace(':bold">', '', $notaPonderada)));
			}
			
			// Obtendo as notas nas disciplinas
			preg_match_all('/<td  align="right" >[ ]{0,2}[0-9]{0,3}[.]?[0-9]{0,2}[*]{0,6}<\/td>/i', $output, $matchs);
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
					$auxNota = trim(str_replace('</td>', '', str_replace('<td  align="right" >', '', $nota)));
					$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][$arrayDisciplinas[$contadorDisciplinas-1]][$tipoProva] = $auxNota;
					if(!strpos($auxNota, '*'))
						$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][$arrayDisciplinas[$contadorDisciplinas-1]][$tipoProva."Num"] = (float) str_replace(',', '.', $auxNota);
					else
						$this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'][$nomeModulo]['disciplinas'][$arrayDisciplinas[$contadorDisciplinas-1]][$tipoProva."Num"] = (float) 0;
						
					unset($matchs[0][$idx]);
				}
			}
			
			if(count($this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos'])==2)
				array_shift($this->dadosCandidatos[$dadosModulo->numero_inscricao]['modulos']);
			
		}
	
			
			
			
		$idxModulo = 0;
		foreach($this->dadosCandidatos as $dadosCandidato){
			foreach($dadosCandidato['modulos'] as $modulo){
				foreach($modulo['disciplinas'] as $codDisciplina => $disciplina){
					// Soma das nota objetiva e discursiva
					$somaNotas = $disciplina['notaObjetiva'] + $disciplina['notaDiscursiva'];
					
					$sql = "DECLARE @id_disciplina INT, @cod_disciplina VARCHAR(3), @id_modulo INT, @quantidade_disc INT;
							DECLARE @id_aluno INT, @id_aluno_modulo INT;
							SET @id_aluno = ".$this->dadosModulo[$idxModulo]->id_aluno.";
							SET @cod_disciplina = '$codDisciplina';
							SET @id_modulo = ".$this->dadosModulo[$idxModulo]->id_modulo.";
							SET @id_aluno_modulo = ".$this->dadosModulo[$idxModulo]->id.";

							DECLARE db_cursor CURSOR FOR SELECT id FROM pism_disciplina WHERE id_modulo = @id_modulo AND cod_disciplina = @cod_disciplina;

							OPEN db_cursor
							FETCH NEXT FROM db_cursor INTO @quantidade_disc

							IF @quantidade_disc IS NULL
								BEGIN
									INSERT INTO pism_disciplina VALUES(@id_modulo, @cod_disciplina, null)
									SET @quantidade_disc = @@IDENTITY
								END

							INSERT INTO pism_nota VALUES(@quantidade_disc, @id_aluno, '".$disciplina['notaDiscursiva']."', '".$disciplina['notaObjetiva']."', ".$disciplina['notaDiscursivaNum'].", ".$disciplina['notaObjetivaNum'].", ".$somaNotas.")
							
							UPDATE pism_modulo_aluno SET carregado = 'S', nota_pond = '".$dadosCandidato['notaPonderada']."' WHERE id = @id_aluno_modulo;
							
							
							DEALLOCATE db_cursor";
					$sql."<br><br>";	
					$this->executeQuery($sql);
				}
			}
			$idxModulo++;
		}
		$time_end = $this->microtime_float();
		$time = $time_end - $time_start;

		echo "Did nothing in $time seconds\n";
	}
	
	

}




$classe = new manutencao();
$classe->execute(7);
?>

<html>
	<head>
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://localhost/manutencaoDadosEnem2.php">
	</head>
	
	<body>
		<?php echo count($classe->dadosModulo); ?>
	</body>	
</html>


