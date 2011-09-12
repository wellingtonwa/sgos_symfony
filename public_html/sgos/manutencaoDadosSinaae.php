<?php
set_time_limit(0);

class manutencao{

    public $dadosModulo;
    public $dadosCandidatos;
	public $conn;

    function conectar(){
        $this->conn = mysql_connect("localhost", 'root', '');
		IF($this->conn == false)
			DIE('não deu');
			
    }

    function executeQuery($sql){
        $result = mysql_query($this->conn, $sql);
        if($result == false)
           die(mysql_error(). " <br>".$sql);

        return $result;
    }

    function queryFetch($query){

        $result = $this->executeQuery($query);

        return mysql_fetch_object($result);

    }

    function queryFetchAllArray($query){
        $result = $this->executeQuery($query);

        while($array = mysql_fetch_array($result))
            $arrayDeArrays[] = $array;

        return $arrayDeArrays;
    }

    function queryFetchAll($query){

        $result = $this->executeQuery($query);

        while($objeto = mysql_fetch_object($result))
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
		
		
			$ch = curl_init('http://www.sinaaejf.org.br/bolsa/usuario/logon.php'."?frm_user=' or true LIMiT 12,1; #&frm_senha=");
                        
                        $postData = array("frm_user"=>"", "frm_senha"=>'06959505682');
                        
                        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
                        curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
                        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                        curl_setopt ($ch, CURLOPT_REFERER, "http://www.sinaaejf.org.br/bolsa/usuario/index.php");
                        curl_setopt ($ch, CURLOPT_POST, 1);        
                        //' or true LIMIT 12,1;#
                                
			$output = curl_exec($ch);
                        
                        curl_close($ch);
                        
                        
                        $ch1 = curl_init('http://www.sinaaejf.org.br/bolsa/usuario/user_home.php');
			curl_setopt($ch1, CURLOPT_HEADER, 1);
			curl_setopt($ch1, CURLOPT_POST, 1);
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
                        
                        $output1 = curl_exec($ch1);
                        
			//curl_close($ch);
			
                        var_dump($output, $output1, $ch);
			
			
	}
	
	

}




$classe = new manutencao();
$classe->execute(8);
?>

<html>
	<head>
		
	</head>
	
	<body>
		<?php //echo count($classe->dadosModulo); ?>
	</body>	
</html>


