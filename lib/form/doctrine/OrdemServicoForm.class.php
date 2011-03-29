<?php

/**
 * OrdemServico form.
 *
 * @package    sgos
 * @subpackage form
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdemServicoForm extends BaseOrdemServicoForm
{
  public function configure()
  {
      $this->embedForm('observacao', new ObservacaoOrdemServicoForm());

      $this->getWidget('idCliente')->setAttribute('onChange', "$('#equipamentosCliente').load(changeCliente, {idCliente: this.value});");

      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);

      $this->validatorSchema['observacao']['observacao']->setOption('required', false);
      $this->validatorSchema['observacao']['created_at']->setOption('required', false);
      $this->validatorSchema['observacao']['updated_at']->setOption('required', false);

      $this->validatorSchema->setOption('allow_extra_fields', true);

      $this->validatorSchema->setOption('filter_extra_fields', false);

      

  }

  public function  saveEmbeddedForms($con = null, $forms = null) {

        if (null === $forms)
        {
          $forms = $this->embeddedForms;
        }

        foreach($forms as $form){

            if($form->getModelName() == 'ObservacaoOrdemServico')
                 if(trim($form->getObject()->getObservacao())){
                    $form->getObject()->save($con);
                 }
        }

        //parent::saveEmbeddedForms($con, $forms);
    }

}
