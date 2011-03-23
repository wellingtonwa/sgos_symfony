<?php

/**
 * Servico form base class.
 *
 * @method Servico getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nome'                => new sfWidgetFormInputText(),
      'descricao'           => new sfWidgetFormTextarea(),
      'preco'               => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'servicos_ordem_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'                => new sfValidatorString(array('max_length' => 255)),
      'descricao'           => new sfValidatorString(array('max_length' => 500)),
      'preco'               => new sfValidatorNumber(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'servicos_ordem_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'OrdemServico', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Servico', 'column' => array('nome')))
    );

    $this->widgetSchema->setNameFormat('servico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Servico';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['servicos_ordem_list']))
    {
      $this->setDefault('servicos_ordem_list', $this->object->ServicosOrdem->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveServicosOrdemList($con);

    parent::doSave($con);
  }

  public function saveServicosOrdemList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['servicos_ordem_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ServicosOrdem->getPrimaryKeys();
    $values = $this->getValue('servicos_ordem_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ServicosOrdem', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ServicosOrdem', array_values($link));
    }
  }

}
