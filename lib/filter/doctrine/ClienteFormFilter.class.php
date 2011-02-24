<?php

/**
 * Cliente filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClienteFormFilter extends BaseClienteFormFilter
{
  public function configure()
  {
        $this->setWidget('logradouro',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->setWidget('numero',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->setWidget('complemento',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->setWidget('bairro',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->setWidget('telefoneResidencial',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->setWidget('telefoneComercial',new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
        $this->getWidget('email')->setOption('empty_label', 'vazio');
        $this->getWidget('telefoneResidencial')->setOption('label', 'Telefone Residencial');
        $this->getWidget('telefoneComercial')->setOption('label', 'Telefone Comercial');
        $this->getWidget('idCidade')->setOption('label', 'Cidade');
        $this->getWidget('created_at')->setOption('label', 'Criado em');
        $this->getWidget('created_at')->setOption('template', 'de %from_date%<br />até %to_date%');
        $this->getWidget('updated_at')->setOption('label', 'Atualizado em');
        $this->getWidget('updated_at')->setOption('template', 'de %from_date%<br />até %to_date%');

  }
}
