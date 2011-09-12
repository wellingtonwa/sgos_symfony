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
	
    function execute($idTrienio = null, $anoInicial=null, $anoFinal=null, $modulo){
		$time_start =$this->microtime_float();
        $this->conectar();
		
		
        $arrayLetras = range('A', 'Z');
        if($idTrienio){
            $sql = "SELECT * FROM pism_modulo WHERE id_trienio = ".$idTrienio." AND numero_modulo = ".$modulo;
        }
        else if($anoInicial AND $anoFinal){
            $sql = "SELECT *
                        FROM pism_modulo
                        WHERE id_trienio IN (SELECT id
                                                FROM pism_trienio
                                                WHERE ano_inicial = ".$anoInicial."
                                                    AND ano_final = ".$anoFinal.")
                              AND numero_modulo = ".$modulo;
        }
		echo $sql;
        $this->dadosModulo = $this->queryFetch($sql);
	

        if(!$this->dadosModulo)
            die('Não foi possível obter os dados do trienio ou não há módulo cadastrado para o triênio!');




        foreach($arrayLetras as $numeroLetra=>$letra){
            $ch = curl_init($this->dadosModulo->link."&letra=".$letra);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            
            // Obtendo o número de inscrição do candidato
            preg_match_all("/f=\"javascript:notas\('[0-9-]*'\)/i", $output, $matchs);
			// Obtendo os nomes dos candidatos
			preg_match_all("/bold\">[a-zA-Z¦. '-]+</i", $output, $matchsNomes);
			
			
			echo $letra;
            foreach($matchs[0] AS $idxInscricao=>$numeroInscricao){
                    $numeroInscricao = substr($numeroInscricao, 21,8);
                    $this->dadosCandidatos[$numeroInscricao]['inscricao'] = $numeroInscricao;
					$this->dadosCandidatos[$numeroInscricao]['link_nota'] = $this->getUrlNotaCandidato($numeroInscricao);
                    $this->dadosCandidatos[$numeroInscricao]['nome'] = str_replace("'", "''", substr($matchsNomes[0][$idxInscricao], 6, -1));
            }
			
			foreach($this->dadosCandidatos as $dadosCandidato){
				$link = $dadosCandidato['link_nota'];
				$inscricao = $dadosCandidato['inscricao'];
				$nome = $dadosCandidato['nome'];
				$sql = "
					DECLARE @id_aluno INT;
					DECLARE db_cursor CURSOR FOR SELECT id FROM pism_aluno WHERE numero_inscricao = '$inscricao'

					OPEN db_cursor FETCH NEXT FROM db_cursor INTO @id_aluno

					BEGIN TRANSACTION;

					IF @id_aluno IS NULL
						BEGIN 
							INSERT INTO pism_aluno VALUES ('".$nome."', '".$inscricao."', null, null);
							SET @id_aluno = @@IDENTITY;
						END 

					INSERT INTO pism_modulo_aluno VALUES ('".$this->dadosModulo->id."', @id_aluno, '".$link."', 'N', null);

					IF @@ERROR <> 0
						BEGIN
							ROLLBACK TRANSACTION;
						END
					ELSE
						BEGIN
							COMMIT TRANSACTION;
						END
					
					DEALLOCATE db_cursor
				";
				$this->executeQuery($sql);
				
				//$this->executeQuery("INSERT INTO pism_aluno VALUES ('".$nome."', '".$inscricao."', null)"); 
				//$this->executeQuery("INSERT INTO pism_modulo_aluno VALUES ('".$this->dadosModulo->id."', @@IDENTITY, '".$link."', 'N', null);");
				
			}
			
			$this->dadosCandidatos = null;
        }

    }

}




$classe = new manutencao();
$classe->execute(2, null, null, 1);
?>
