<?php

/**
 * Solicitacao filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SolicitacaoFormFilter extends BaseSolicitacaoFormFilter
{
  public function configure()
  {
      $this->widgetSchema['telefone2']->setOption('label' ,'Telefone Celular');
      $this->widgetSchema['telefone2']->setOption('empty_label', 'vazio');
      $this->widgetSchema['created_at']->setOption('template', 'de %from_date%<br />até %to_date%');
      //$this->widgetSchema['created_at']->setOption('format', '%month%/%day%/%year%');
      $this->widgetSchema['updated_at']->setOption('template', 'de %from_date%<br />até %to_date%');


  }
}
