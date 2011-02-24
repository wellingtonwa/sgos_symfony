<?php

/**
 * ordemServico module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ordemServico
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrdemServicoGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_save' =>   array(    'label' => 'alterar',  ),  '_list' =>   array(    'label' => 'voltar',  ),  '_delete' =>   array(    'label' => 'excluir',  ),);
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
    return '%%id%% - %%cliente%% - %%equipamento%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Lista de Ordem de Servico';
  }

  public function getEditTitle()
  {
    return 'Editando Ordem de Serviço';
  }

  public function getNewTitle()
  {
    return 'Nova Ordem de Serviço';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'status',  1 => 'created_at',);
  }

  public function getFormDisplay()
  {
    return array();
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
    return array(  0 => 'id',  1 => 'cliente',  2 => 'equipamento',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'N. OS',),
      'idCliente' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Cliente',),
      'idEquipamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',  'label' => 'Status',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Criado em',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'servicos_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'componentes_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'equipamentos_ordem_servico_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Equipamentos',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'idCliente' => array(),
      'idEquipamento' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'servicos_list' => array(),
      'componentes_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'idCliente' => array(),
      'idEquipamento' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'servicos_list' => array(),
      'componentes_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'idCliente' => array(),
      'idEquipamento' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'servicos_list' => array(),
      'componentes_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'idCliente' => array(),
      'idEquipamento' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'servicos_list' => array(),
      'componentes_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'idCliente' => array(),
      'idEquipamento' => array(),
      'status' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'servicos_list' => array(),
      'componentes_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'OrdemServicoForm';
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
    return 'OrdemServicoFormFilter';
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
