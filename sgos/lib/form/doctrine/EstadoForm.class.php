<?php

/**
 * Estado form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstadoForm extends BaseEstadoForm
{
  public function configure()
  {
    $this->removeFields();

    $this->widgetSchema['idPais'] = new sfWidgetFormDoctrineChoice(array('model' =>'Pais', 'method'=>'getNome'));

    $this->validatorSchema['nome'] = new sfValidatorString(array('required'=>true,
                                                                'min_length'=>3),
                                                           array('required'=>"Preencha o nome do Estado",
                                                                'min_length'=>'Preencha corretamente o nome do Estado'));

    $this->validatorSchema['sigla'] = new sfValidatorString(array('required'=>true,
                                                                  'min_length'=>2,
                                                                  'max_length'=>2),
                                                            array('required'=>'Preencha a sigla do Estado',
                                                                  'min_length'=>'A sigla tem que ter 2 caracteres',
                                                                  'max_length'=>'A sigla tem que ter 2 caracteres'));
    
  }

  function removeFields(){
      unset($this['created_at'], $this['updated_at']);
  }

}
