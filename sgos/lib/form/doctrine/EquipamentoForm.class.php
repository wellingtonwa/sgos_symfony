<?php

/**
 * Equipamento form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EquipamentoForm extends BaseEquipamentoForm
{
  public function configure()
  {
      $this->getWidget('descricao')->setOption('label', 'Descrição');
      $this->getWidget('idTipoEquipamento')->setOption('label', 'Tipo de Equipamento');
      $this->getWidget('idCliente')->setOption('label', 'Cliente');

      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);

  }
}
