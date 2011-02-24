<?php

/**
 * Pais form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaisForm extends BasePaisForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);

      $this->validatorSchema['nome'] = new sfValidatorString(
            array('required'=>true),
            array('required'=>'Este campo é obrigatório'));


      $this->validatorSchema['sigla'] = new sfValidatorString(
                                        array('min_length'=>'3',
                                              'max_length'=>'3',
                                              'required'=>true),
                                        array('min_length'=>'A sigla deve conter 3 letras',
                                              'max_length'=>'A sigla deve conter no máximo 3 letras',
                                              'required'=>'Este campo é obrigatório'));

      
  }

}
