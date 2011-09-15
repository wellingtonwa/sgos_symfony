<?php

/**
 * Cidade form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CidadeForm extends BaseCidadeForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      
      $this->validatorSchema['nome']->setMessage('required', 'Preencha o nome da cidade.');
  }
}
