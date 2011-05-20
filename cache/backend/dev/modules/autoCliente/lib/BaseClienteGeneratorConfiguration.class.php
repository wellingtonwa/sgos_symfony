<?php

/**
 * cliente module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage cliente
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClienteGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_save' =>   array(    'label' => 'Salvar',  ),  '_list' =>   array(    'label' => 'Voltar',  ),  '_delete' =>   array(    'label' => 'Excluir',  ),);
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
    return '%%=nome%% - %%=email%% - %%=telefoneResidencial%% - %%=telefoneComercial%% - %%=cidade%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Clientes';
  }

  public function getEditTitle()
  {
    return 'Editando - %%nome%%';
  }

  public function getNewTitle()
  {
    return 'Nome Cliente';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'nome',  1 => 'email',  2 => 'logradouro',  3 => 'numero',  4 => 'bairro',  5 => 'idCidade',  6 => 'created_at',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array(  0 => 'nome',  1 => 'email',  2 => 'logradouro',  3 => 'numero',  4 => 'complemento',  5 => 'bairro',  6 => 'idCidade',  7 => 'telefoneResidencial',  8 => 'telefoneComercial',);
  }

  public function getNewDisplay()
  {
    return array(  0 => 'nome',  1 => 'email',  2 => 'logradouro',  3 => 'numero',  4 => 'complemento',  5 => 'bairro',  6 => 'idCidade',  7 => 'telefoneResidencial',  8 => 'telefoneComercial',);
  }

  public function getListDisplay()
  {
    return array(  0 => '=nome',  1 => '=email',  2 => '=telefoneResidencial',  3 => '=telefoneComercial',  4 => '=cidade',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nome' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'logradouro' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'numero' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'complemento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'bairro' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'idCidade' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'telefoneResidencial' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'telefoneComercial' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'email' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'idUsuario' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'logradouro' => array(),
      'numero' => array(),
      'complemento' => array(),
      'bairro' => array(),
      'idCidade' => array(),
      'telefoneResidencial' => array(),
      'telefoneComercial' => array(),
      'email' => array(),
      'idUsuario' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'logradouro' => array(),
      'numero' => array(),
      'complemento' => array(),
      'bairro' => array(),
      'idCidade' => array(),
      'telefoneResidencial' => array(),
      'telefoneComercial' => array(),
      'email' => array(),
      'idUsuario' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'logradouro' => array(),
      'numero' => array(),
      'complemento' => array(),
      'bairro' => array(),
      'idCidade' => array(),
      'telefoneResidencial' => array(),
      'telefoneComercial' => array(),
      'email' => array(),
      'idUsuario' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'logradouro' => array(),
      'numero' => array(),
      'complemento' => array(),
      'bairro' => array(),
      'idCidade' => array(),
      'telefoneResidencial' => array(),
      'telefoneComercial' => array(),
      'email' => array(),
      'idUsuario' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'nome' => array(),
      'logradouro' => array(),
      'numero' => array(),
      'complemento' => array(),
      'bairro' => array(),
      'idCidade' => array(),
      'telefoneResidencial' => array(),
      'telefoneComercial' => array(),
      'email' => array(),
      'idUsuario' => array(),
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
    return 'clienteForm';
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
    return 'clienteFormFilter';
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
