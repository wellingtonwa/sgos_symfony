<?php

/**
 * componente module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage componente
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComponenteGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_save' =>   array(    'label' => 'Salvar',  ),  '_list' =>   array(    'label' => 'Voltar',  ),);
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
    return '%%nome%% - %%descricao%% - %%preco%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Componentes';
  }

  public function getEditTitle()
  {
    return 'Editando - %%nome%%';
  }

  public function getNewTitle()
  {
    return 'Novo Componente';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'preco',  3 => 'created_at',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'preco',);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'nome',  1 => 'descricao',  2 => 'preco',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nome' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'descricao' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'preco' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Criado em',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'componentes_ordem_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'preco' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'componentes_ordem_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'preco' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'componentes_ordem_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'preco' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'componentes_ordem_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'preco' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'componentes_ordem_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'descricao' => array(),
      'preco' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'componentes_ordem_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ComponenteForm';
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
    return 'ComponenteFormFilter';
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
