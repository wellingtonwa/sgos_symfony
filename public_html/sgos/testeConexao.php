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
	
		$this->conectar();
		
		
		var_dump($this->queryFetchAll("SELECT * FROM pism_trienio"));
		
		
//		IF(odbc_connect('ACAprod1_php', 'webuserac', 'ocvuosqlserver') == false)
	//		DIE('não deu');
		
	}
	
	

}




$classe = new manutencao();
$classe->execute(9);
?>




