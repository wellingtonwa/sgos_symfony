<?php

/**
 * Equipamento form base class.
 *
 * @method Equipamento getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEquipamentoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nome'              => new sfWidgetFormInputText(),
      'descricao'         => new sfWidgetFormTextarea(),
      'idTipoEquipamento' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoEquipamento'), 'add_empty' => true)),
      'idCliente'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'              => new sfValidatorString(array('max_length' => 255)),
      'descricao'         => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'idTipoEquipamento' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoEquipamento'), 'required' => false)),
      'idCliente'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('equipamento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipamento';
  }

}
