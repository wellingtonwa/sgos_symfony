<?php

/**
 * OrdemServico filter form base class.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrdemServicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idCliente'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'idEquipamento'      => new sfWidgetFormFilterInput(),
      'status'             => new sfWidgetFormChoice(array('choices' => array('' => '', 'Em aberto' => 'Em aberto', 'Em execucao' => 'Em execucao', 'Pendente' => 'Pendente', 'Cancelado' => 'Cancelado', 'Concluído' => 'Concluído'))),
      'descricao_problema' => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'servicos_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Servico')),
      'componentes_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Componente')),
    ));

    $this->setValidators(array(
      'idCliente'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cliente'), 'column' => 'id')),
      'idEquipamento'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'             => new sfValidatorChoice(array('required' => false, 'choices' => array('Em aberto' => 'Em aberto', 'Em execucao' => 'Em execucao', 'Pendente' => 'Pendente', 'Cancelado' => 'Cancelado', 'Concluído' => 'Concluído'))),
      'descricao_problema' => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'servicos_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Servico', 'required' => false)),
      'componentes_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Componente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ordem_servico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addServicosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ServicoOrdemServico ServicoOrdemServico')
      ->andWhereIn('ServicoOrdemServico.idServico', $values)
    ;
  }

  public function addComponentesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ComponenteOrdemServico ComponenteOrdemServico')
      ->andWhereIn('ComponenteOrdemServico.idComponente', $values)
    ;
  }

  public function getModelName()
  {
    return 'OrdemServico';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'idCliente'          => 'ForeignKey',
      'idEquipamento'      => 'Number',
      'status'             => 'Enum',
      'descricao_problema' => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'servicos_list'      => 'ManyKey',
      'componentes_list'   => 'ManyKey',
    );
  }
}
