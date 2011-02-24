<?php

/**
 * equipamento module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage equipamento
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseEquipamentoGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array(  '_save' =>   array(    'label' => 'salvar',  ),  '_list' =>   array(    'label' => 'voltar',  ),);
  }

  public function getEditActions()
  {
    return array(  '_save' =>   array(    'label' => 'salvar',  ),  '_list' =>   array(    'label' => 'voltar',  ),  '_delete' =>   array(    'label' => 'excluir',  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%nome%% - %%tipoEquipamento%% - %%cliente%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Equipamentos';
  }

  public function getEditTitle()
  {
    return 'editando - %%nome%%';
  }

  public function getNewTitle()
  {
    return 'Novo Equipamento';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'idTipoEquipamento',  3 => 'idCliente',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'idTipoEquipamento',  3 => 'idCliente',);
  }

  public function getNewDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'idTipoEquipamento',  3 => 'idCliente',);
  }

  public function getListDisplay()
  {
    return array(  0 => 'nome',  1 => 'tipoEquipamento',  2 => 'cliente',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nome' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'descricao' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'idTipoEquipamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Tipo de Equipamento',),
      'idCliente' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'idTipoEquipamento' => array(),
      'idCliente' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'idTipoEquipamento' => array(),
      'idCliente' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'idTipoEquipamento' => array(),
      'idCliente' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'idTipoEquipamento' => array(),
      'idCliente' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'idTipoEquipamento' => array(),
      'idCliente' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'EquipamentoForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'EquipamentoFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
