<?php

/**
 * BasePrecoServico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property decimal $preco
 * @property timestamp $dataInicio
 * @property integer $idServico
 * @property Servico $Servico
 * 
 * @method decimal      getPreco()      Returns the current record's "preco" value
 * @method timestamp    getDataInicio() Returns the current record's "dataInicio" value
 * @method integer      getIdServico()  Returns the current record's "idServico" value
 * @method Servico      getServico()    Returns the current record's "Servico" value
 * @method PrecoServico setPreco()      Sets the current record's "preco" value
 * @method PrecoServico setDataInicio() Sets the current record's "dataInicio" value
 * @method PrecoServico setIdServico()  Sets the current record's "idServico" value
 * @method PrecoServico setServico()    Sets the current record's "Servico" value
 * 
 * @package    sgos
 * @subpackage model
 * @author     Wellington Wagner
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePrecoServico extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('preco_servico');
        $this->hasColumn('preco', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             ));
        $this->hasColumn('dataInicio', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('idServico', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Servico', array(
             'local' => 'idServico',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}