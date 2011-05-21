<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nome'                => new sfWidgetFormInputText(),
      'logradouro'          => new sfWidgetFormInputText(),
      'numero'              => new sfWidgetFormInputText(),
      'complemento'         => new sfWidgetFormInputText(),
      'bairro'              => new sfWidgetFormInputText(),
      'idCidade'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cidade'), 'add_empty' => true)),
      'telefoneResidencial' => new sfWidgetFormInputText(),
      'telefoneComercial'   => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'idUsuario'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'                => new sfValidatorString(array('max_length' => 255)),
      'logradouro'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'complemento'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bairro'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'idCidade'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cidade'), 'required' => false)),
      'telefoneResidencial' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telefoneComercial'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'idUsuario'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

}
