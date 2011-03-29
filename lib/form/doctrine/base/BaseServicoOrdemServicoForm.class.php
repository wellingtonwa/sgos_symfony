<?php

/**
 * ServicoOrdemServico form base class.
 *
 * @method ServicoOrdemServico getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicoOrdemServicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => false)),
      'idServico'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Servico'), 'add_empty' => false)),
      'quantidade'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'))),
      'idServico'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Servico'))),
      'quantidade'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('servico_ordem_servico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicoOrdemServico';
  }

}
