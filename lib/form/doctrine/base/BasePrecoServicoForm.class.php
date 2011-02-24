<?php

/**
 * PrecoServico form base class.
 *
 * @method PrecoServico getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrecoServicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'preco'      => new sfWidgetFormInputText(),
      'dataInicio' => new sfWidgetFormDateTime(),
      'idServico'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Servico'), 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'preco'      => new sfValidatorNumber(array('required' => false)),
      'dataInicio' => new sfValidatorDateTime(array('required' => false)),
      'idServico'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Servico'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('preco_servico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PrecoServico';
  }

}
