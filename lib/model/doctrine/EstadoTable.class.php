<?php


class EstadoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Estado');
    }
   

    public function retrieveBackendEstadoList(Doctrine_Query $q){
        $rootAlias = $q->getRootAlias();

        $q->leftJoin($rootAlias.".Pais p");

        return $q;
    }
}