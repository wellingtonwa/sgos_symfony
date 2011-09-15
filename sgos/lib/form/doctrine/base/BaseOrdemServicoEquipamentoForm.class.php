<?php

/**
 * OrdemServicoEquipamento form base class.
 *
 * @method OrdemServicoEquipamento getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrdemServicoEquipamentoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'idEquipamento'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipamento'), 'add_empty' => false)),
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idEquipamento'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipamento'))),
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'))),
    ));

    $this->widgetSchema->setNameFormat('ordem_servico_equipamento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrdemServicoEquipamento';
  }

}
