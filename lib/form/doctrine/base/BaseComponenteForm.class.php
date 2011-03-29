<?php

/**
 * Componente form base class.
 *
 * @method Componente getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComponenteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'nome'                   => new sfWidgetFormInputText(),
      'descricao'              => new sfWidgetFormTextarea(),
      'preco'                  => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'componentes_ordem_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'                   => new sfValidatorString(array('max_length' => 255)),
      'descricao'              => new sfValidatorString(array('max_length' => 500)),
      'preco'                  => new sfValidatorNumber(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'componentes_ordem_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Componente', 'column' => array('nome')))
    );

    $this->widgetSchema->setNameFormat('componente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Componente';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['componentes_ordem_list']))
    {
      $this->setDefault('componentes_ordem_list', $this->object->ComponentesOrdem->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveComponentesOrdemList($con);

    parent::doSave($con);
  }

  public function saveComponentesOrdemList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['componentes_ordem_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ComponentesOrdem->getPrimaryKeys();
    $values = $this->getValue('componentes_ordem_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ComponentesOrdem', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ComponentesOrdem', array_values($link));
    }
  }

}
