<?php

/**
 * OrdemServico form base class.
 *
 * @method OrdemServico getObject() Returns the current form's model object
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrdemServicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'idCliente'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'add_empty' => true)),
      'idEquipamento'      => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormChoice(array('choices' => array('Em aberto' => 'Em aberto', 'Em execução' => 'Em execução', 'Pendente' => 'Pendente', 'Cancelado' => 'Cancelado', 'Concluído' => 'Concluído'))),
      'descricao_problema' => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'servicos_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Servico')),
      'componentes_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Componente')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'idCliente'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cliente'), 'required' => false)),
      'idEquipamento'      => new sfValidatorInteger(array('required' => false)),
      'status'             => new sfValidatorChoice(array('choices' => array(0 => 'Em aberto', 1 => 'Em execucao', 2 => 'Pendente', 3 => 'Cancelado', 4 => 'Concluído'), 'required' => false)),
      'descricao_problema' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'servicos_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Servico', 'required' => false)),
      'componentes_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Componente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ordem_servico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OrdemServico';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['servicos_list']))
    {
      $this->setDefault('servicos_list', $this->object->Servicos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['componentes_list']))
    {
      $this->setDefault('componentes_list', $this->object->Componentes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveServicosList($con);
    $this->saveComponentesList($con);

    parent::doSave($con);
  }

  public function saveServicosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['servicos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Servicos->getPrimaryKeys();
    $values = $this->getValue('servicos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Servicos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Servicos', array_values($link));
    }
  }

  public function saveComponentesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['componentes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Componentes->getPrimaryKeys();
    $values = $this->getValue('componentes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Componentes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Componentes', array_values($link));
    }
  }

}
