<?php

/**
 * OrdemServicoEquipamento filter form base class.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrdemServicoEquipamentoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idEquipamento'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipamento'), 'add_empty' => true)),
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'idEquipamento'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipamento'), 'column' => 'id')),
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdemServico'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ordem_servico_equipamento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrdemServicoEquipamento';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'idEquipamento'  => 'ForeignKey',
      'idOrdemServico' => 'ForeignKey',
    );
  }
}
