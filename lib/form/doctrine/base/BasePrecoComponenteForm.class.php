<?php

/**
 * PrecoComponente form base class.
 *
 * @method PrecoComponente getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrecoComponenteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'preco'        => new sfWidgetFormInputText(),
      'dataInicio'   => new sfWidgetFormDateTime(),
      'idComponente' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'), 'add_empty' => false)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'preco'        => new sfValidatorNumber(array('required' => false)),
      'dataInicio'   => new sfValidatorDateTime(array('required' => false)),
      'idComponente' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'))),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('preco_componente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PrecoComponente';
  }

}
