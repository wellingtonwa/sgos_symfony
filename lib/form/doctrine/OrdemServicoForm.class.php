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

      
      
      // Adicionando o form de observacao ao form de Ordem de Servico
      $this->embedForm('observacao', new ObservacaoOrdemServicoForm());

      $this->getWidget('idCliente')->setAttribute('onChange', "$('#equipamentosCliente').load(changeCliente, {idCliente: this.value});");

      $this->getValidator('created_at')->setOption('required', false);
      $this->getValidator('updated_at')->setOption('required', false);

      // Configurando os campos da observacao
      $this->widgetSchema['observacao']['status'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['observacao']['idUsuario'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['observacao']['idOrdemServico'] = new sfWidgetFormInputHidden();

      // Configurando os validadores da Observacao
      $this->validatorSchema['observacao']['observacao']->setOption('required', false);
      $this->validatorSchema['observacao']['created_at']->setOption('required', false);
      $this->validatorSchema['observacao']['updated_at']->setOption('required', false);
      $this->validatorSchema['observacao']['status']->setOption('required', false);
      
      // Configurando o formulário para aceitar campos extras
      $this->validatorSchema->setOption('allow_extra_fields', true);
      $this->validatorSchema->setOption('filter_extra_fields', false);

      

  }

  public function  saveEmbeddedForms($con = null, $forms = null) {

        $status = $this->getObject()->getStatus();

        if (null === $forms)
        {
          $forms = $this->embeddedForms;
        }

        foreach($forms as $form){

            if($form->getModelName() == 'ObservacaoOrdemServico')
                 $textoAlteracao = $this->getDiffOrdemServico ();
                 if(trim($form->getObject()->getObservacao()) || empty($textoAlteracao)==false){
                    $form->getObject()->setStatus($status);
                    $textoObservacao = $form->getObject()->getObservacao();
                    $textoAlteracao .= empty($textoAlteracao) ? '' : '<br>';
                    $form->getObject()->setObservacao($textoAlteracao.$textoObservacao);
                    $form->getObject()->save($con);
                 }
        }

        //parent::saveEmbeddedForms($con, $forms);
    }

    public function getDiffOrdemServico(){        

        $sfUser = sfContext::getInstance()->getUser();

        $ordemServicoAntiga = $sfUser->getAttribute('ordem_servico');
        $ordemServicoNova = $this->getObject();
        // Fazendo as comparações entre os conteúdos
        if($ordemServicoAntiga->getIdCliente() != $ordemServicoNova->getIdCliente()){
            $textoObservacao = "- Cliente alterado de ".$ordemServicoAntiga->getCliente()->getNome()." para ".$ordemServicoNova->getCliente()->getNome();
        }
        if($ordemServicoAntiga->getStatus() != $ordemServicoNova->getStatus()){
            $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
            $textoObservacao .= '- Status alterado de '.$ordemServicoAntiga->getStatus().' para '.$ordemServicoNova->getStatus();
        }

        return $textoObservacao;
    }

    public function getDiffServicos(){

    }

    public function getDiffComponentes(){
        
    }

}
