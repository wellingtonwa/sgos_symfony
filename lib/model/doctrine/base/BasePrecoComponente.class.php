<?php

/**
 * BasePrecoComponente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property decimal $preco
 * @property timestamp $dataInicio
 * @property integer $idComponente
 * @property Componente $Componente
 * 
 * @method decimal         getPreco()        Returns the current record's "preco" value
 * @method timestamp       getDataInicio()   Returns the current record's "dataInicio" value
 * @method integer         getIdComponente() Returns the current record's "idComponente" value
 * @method Componente      getComponente()   Returns the current record's "Componente" value
 * @method PrecoComponente setPreco()        Sets the current record's "preco" value
 * @method PrecoComponente setDataInicio()   Sets the current record's "dataInicio" value
 * @method PrecoComponente setIdComponente() Sets the current record's "idComponente" value
 * @method PrecoComponente setComponente()   Sets the current record's "Componente" value
 * 
 * @package    sgos
 * @subpackage model
 * @author     Wellington Wagner
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePrecoComponente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('preco_componente');
        $this->hasColumn('preco', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             ));
        $this->hasColumn('dataInicio', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('idComponente', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Componente', array(
             'local' => 'idComponente',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}