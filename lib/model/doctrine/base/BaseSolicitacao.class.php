<?php

/**
 * BaseSolicitacao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nome
 * @property string $email
 * @property string $telefone1
 * @property string $telefone2
 * @property string $descricao_problema
 * @property integer $idOrdemServico
 * @property OrdemServico $OrdemServico
 * 
 * @method string       getNome()               Returns the current record's "nome" value
 * @method string       getEmail()              Returns the current record's "email" value
 * @method string       getTelefone1()          Returns the current record's "telefone1" value
 * @method string       getTelefone2()          Returns the current record's "telefone2" value
 * @method string       getDescricaoProblema()  Returns the current record's "descricao_problema" value
 * @method integer      getIdOrdemServico()     Returns the current record's "idOrdemServico" value
 * @method OrdemServico getOrdemServico()       Returns the current record's "OrdemServico" value
 * @method Solicitacao  setNome()               Sets the current record's "nome" value
 * @method Solicitacao  setEmail()              Sets the current record's "email" value
 * @method Solicitacao  setTelefone1()          Sets the current record's "telefone1" value
 * @method Solicitacao  setTelefone2()          Sets the current record's "telefone2" value
 * @method Solicitacao  setDescricaoProblema()  Sets the current record's "descricao_problema" value
 * @method Solicitacao  setIdOrdemServico()     Sets the current record's "idOrdemServico" value
 * @method Solicitacao  setOrdemServico()       Sets the current record's "OrdemServico" value
 * 
 * @package    sgos
 * @subpackage model
 * @author     Wellington Wagner
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSolicitacao extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('solicitacao');
        $this->hasColumn('nome', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('telefone1', 'string', 14, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 14,
             ));
        $this->hasColumn('telefone2', 'string', 14, array(
             'type' => 'string',
             'length' => 14,
             ));
        $this->hasColumn('descricao_problema', 'string', 500, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 500,
             ));
        $this->hasColumn('idOrdemServico', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrdemServico', array(
             'local' => 'idOrdemServico',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}