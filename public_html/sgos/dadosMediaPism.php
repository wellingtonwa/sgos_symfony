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

    function execute($modulo){
		
		
		
		
					
    }

}




$classe = new manutencao();
$classe->execute(8);
$this->conectar();

// Obtendo as Disciplinas
$sql = "SELECT cod_disciplina FROM pism_disciplina WHERE id_modulo = $modulo";


$dadosDisciplinas = $this->queryFetchAll($sql);


foreach($dadosDisciplinas as $disciplina){
	$sql = "select CASE nota.nota_discursiva WHEN '***' THEN '0' ELSE nota.nota_discursiva END AS nota_discursiva
					, CASE nota.nota_objetiva WHEN '*' THEN '0' ELSE nota.nota_objetiva END AS nota_objetiva
					, disciplina.cod_disciplina
			FROM pism_nota nota, pism_disciplina disciplina 
			WHERE disciplina.id = nota.id_disciplina 
				AND disciplina.id_modulo = $modulo 
				AND disciplina.cod_disciplina = '".$disciplina->cod_disciplina."'";
	
	$dadosNotasCandidatos = $this->queryFetchAll($sql);
	
	foreach($dadosNotasCandidatos as $notaCandidato){
		$dadosCalculosDisciplina[$notaCandidato->cod_disciplina]['somaNotaDiscursiva'] += (float) str_replace(',', '.', $notaCandidato->nota_discursiva);
		$dadosCalculosDisciplina[$notaCandidato->cod_disciplina]['somaNotaObjetiva'] += (float) str_replace(',', '.', $notaCandidato->nota_objetiva);
	}
		
	$dadosCalculosDisciplina[$notaCandidato->cod_disciplina]['totalCandidatos'] = count($dadosNotasCandidatos);
}	

foreach($dadosCalculosDisciplina as $codDisciplina=>$dadoNotaCandidato){
	$dadosCalculosDisciplina[$codDisciplina]['mediaDiscursiva'] = $dadoNotaCandidato['somaNotaDiscursiva']/$dadoNotaCandidato['totalCandidatos'];
	$dadosCalculosDisciplina[$codDisciplina]['mediaObjetiva'] = $dadoNotaCandidato['somaNotaObjetiva']/$dadoNotaCandidato['totalCandidatos'];
	$dadosCalculosDisciplina[$codDisciplina]['somaMedia'] = $dadosCalculosDisciplina[$codDisciplina]['mediaDiscursiva'] + $dadosCalculosDisciplina[$codDisciplina]['mediaObjetiva'];
}



?>
<table>
	<tr>
		<td>
		<td>
	</tr>
</table>
