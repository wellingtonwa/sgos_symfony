<?php

/**
 * TipoEquipamento form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoEquipamentoForm extends BaseTipoEquipamentoForm
{
  public function configure()
  {

      $this->setWidget('created_at', new sfWidgetFormInputHidden());
      $this->setWidget('updated_at', new sfWidgetFormInputHidden());

      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);
      
      $this->validatorSchema['nome']->setMessage('required', 'Preencha o nome do tipo de equipamento');
      

  }
}
