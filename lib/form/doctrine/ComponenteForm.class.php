<?php

/**
 * Componente form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ComponenteForm extends BaseComponenteForm
{
  public function configure()
  {
      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);
  }
}
