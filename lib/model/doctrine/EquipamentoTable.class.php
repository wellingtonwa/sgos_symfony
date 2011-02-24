<?php


class EquipamentoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Equipamento');
    }
}