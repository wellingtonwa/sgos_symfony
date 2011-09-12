<?php
set_time_limit(0);

class manutencao{
	
	public $host = 'localhost';
	public $user = 'webportal';
	public $password = '11235813';
	public $dataBase = 'Acaprod1';
	public $conection;
	
	function iniciarConexaoNativa(){
        $conexao = mssql_connect($this->host, $this->user, $this->password) or die ('Não foi possível Conectar!');
        mssql_select_db($this->dataBase, $conexao) or die('Não foi possível selecionar o banco!');
		$this->conection = $conexao;
        return $conexao;
    }

    function fecharConexaoNativa($conexao){
        $conexao = null;
    } 
	
	function executeQuery($sql){
        $result = mssql_query($sql, $this->conection);
        if($result == false)
            die(mssql_get_last_message(). " <br>".$sql);

        return mssql_query($sql, $this->conection);
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
	
	
    function execute(){
		$sql = "SELECT * FROM tbcolaborador"
		var_dump($this->get)
	}
	
	

}




$classe = new manutencao();
$classe->execute();
?>



