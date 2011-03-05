<?php

/**
 * Solicitacao form base class.
 *
 * @method Solicitacao getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSolicitacaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nome'               => new sfWidgetFormInputText(),
      'email'              => new sfWidgetFormInputText(),
      'telefone1'          => new sfWidgetFormInputText(),
      'telefone2'          => new sfWidgetFormInputText(),
      'descricao_problema' => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'               => new sfValidatorString(array('max_length' => 100)),
      'email'              => new sfValidatorString(array('max_length' => 100)),
      'telefone1'          => new sfValidatorString(array('max_length' => 14)),
      'telefone2'          => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'descricao_problema' => new sfValidatorString(array('max_length' => 500)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('solicitacao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Solicitacao';
  }

}