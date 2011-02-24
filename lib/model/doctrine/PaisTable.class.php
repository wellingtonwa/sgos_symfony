<?php


class PaisTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Pais');
    }

    public function getPaises(){

        $query = Doctrine_Query::create();
        $query->addFrom('pais p');

        return $query->execute();

    }

}