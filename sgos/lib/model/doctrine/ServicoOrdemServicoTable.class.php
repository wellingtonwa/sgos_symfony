<?php


class ServicoOrdemServicoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ServicoOrdemServico');
    }
}