<?php

/**
 * Componente filter form base class.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComponenteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descricao'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'preco'                  => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'componentes_ordem_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico')),
    ));

    $this->setValidators(array(
      'nome'                   => new sfValidatorPass(array('required' => false)),
      'descricao'              => new sfValidatorPass(array('required' => false)),
      'preco'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'componentes_ordem_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('componente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addComponentesOrdemListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ComponenteOrdemServico.id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Componente';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'nome'                   => 'Text',
      'descricao'              => 'Text',
      'preco'                  => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'componentes_ordem_list' => 'ManyKey',
    );
  }
}
