<?php

/**
 * Cliente form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {

    $this->getWidget('telefoneResidencial')->setOption('label', 'Telefone Residencial');
    $this->getWidget('telefoneComercial')->setOption('label', 'Telefone Comercial');
    $this->getWidget('idCidade')->setOption('label', 'Cidade');
    $this->getWidget('created_at')->setOption('label', 'Criado em');
    $this->getWidget('updated_at')->setOption('label', 'Atualizado em');

    $this->getValidator('created_at')->setOption('required', false);
    $this->getValidator('updated_at')->setOption('required', false);
  }
}
