<?php

/**
 * TipoEquipamento filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoEquipamentoFormFilter extends BaseTipoEquipamentoFormFilter
{
  public function configure()
  {
        $this->getWidget('descricao')->setOption('empty_label', 'vazio');
        $this->getWidget('created_at')->setOption('label', 'Criado em');
        $this->getWidget('created_at')->setOption('template', 'de %from_date%<br />até %to_date%');
        $this->getWidget('updated_at')->setOption('label', 'Atualizado em');
        $this->getWidget('updated_at')->setOption('template', 'de %from_date%<br />até %to_date%');
        
  }
}
