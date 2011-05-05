<?php


class OrdemServicoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('OrdemServico');
    }


    function getOrdemServicoCliente($idCliente){

        $query = Doctrine_Query::create()->from("OrdemServico o");

        $alias = $query->getRootAlias();

        $query->andWhere($alias.".idCliente = ?", $idCliente);

        return $query;
    }
}