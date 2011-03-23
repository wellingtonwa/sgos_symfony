<?php

/**
 * ComponenteOrdemServico form base class.
 *
 * @method ComponenteOrdemServico getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComponenteOrdemServicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => false)),
      'idComponente'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'), 'add_empty' => false)),
      'quantidade'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'))),
      'idComponente'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'))),
      'quantidade'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('componente_ordem_servico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComponenteOrdemServico';
  }

}
