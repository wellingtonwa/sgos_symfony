<?php

/**
 * Equipamento filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EquipamentoFormFilter extends BaseEquipamentoFormFilter
{
  public function configure()
  {
      $this->getWidget('descricao')->setOption('empty_label', 'vazio');
      $this->getWidget('idTipoEquipamento')->setOption('label', 'Tipo Equipamento');
      $this->getWidget('idCliente')->setOption('label', 'Cliente');
      


      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);
      
  }
}
