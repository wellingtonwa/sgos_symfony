<?php


class ServicoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Servico');
    }

    public function pesquisarNomeComecandoCom($textoPesquisa){
        $query = $this->createQuery('s')->
                    where('s.nome LIKE ?', $textoPesquisa.'%');
        return $query;
    }
}