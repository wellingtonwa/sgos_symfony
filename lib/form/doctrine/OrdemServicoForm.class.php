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
                    $textoAlteracao .= empty($textoObservacao) ? '' : '<br><br>Observação do Técnico:<br>';
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
        // Verificando se o usuário alterou o status
        if($ordemServicoAntiga->getStatus() != $ordemServicoNova->getStatus()){
            $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
            $textoObservacao .= '- Status alterado de '.$ordemServicoAntiga->getStatus().' para '.$ordemServicoNova->getStatus();
        }

        /**** Verificando os servicos adicionados ou retirados ****/
        // Obtendo os servicos da OS antiga
        $servicosOSAntiga = $ordemServicoAntiga->getServicosOrdemServico();
        // Obtendo os servicos da OS Nova
        $servicosOSNova = $ordemServicoNova->getServicosOrdemServico();
        
        // Organizando os serviços da OS antiga
        foreach($servicosOSAntiga as $servicoOSAntiga){
            $auxServicosOSAntiga[$servicoOSAntiga->getIdServico()] = $servicoOSAntiga->getQuantidade();
        }

        // Organizando os serviços da OS nova
        foreach($servicosOSNova as $servicoOSNova){
            $auxServicosOSNova[$servicoOSNova->getIdServico()] = $servicoOSNova->getQuantidade();
        }
        
        foreach($auxServicosOSAntiga as $idServicoAntigo => $quantidadeOSAntiga){
            // Verificando se o serviço da OS antiga ainda esta na OS nova
            if(in_array($idServicoAntigo, array_keys($auxServicosOSNova))){
               // Verificando se o usuário alterou a quantidade de serviços adicionados
               if($quantidadeOSAntiga > $servicosOSNova[$idServicoAntigo]){
                    $diminuidaQuantidade['servico'][$idServicoAntigo] = array('quantidade'=>($quantidadeOSAntiga-$servicosOSNova[$idServicoAntigo])
                                                                    , 'registro'=>  Doctrine::getTable('Servico')->findById($idServicoAntigo)->getFirst());
               }
               else if($quantidadeOSAntiga < $servicosOSNova[$idServicoAntigo]){
                   $aumentadaQuantidade['servico'][$idServicoAntigo] = array('quantidade'=>($servicosOSNova[$idServicoAntigo]-$quantidadeOSAntiga)
                                                                    , 'registro'=>  Doctrine::getTable('Servico')->findById($idServicoAntigo)->getFirst());
               }
            }
            else{
                $servicosRemovidos[$idServicoAntigo] = Doctrine::getTable('Servico')->findById($idServicoAntigo)->getFirst();
            }
        }
        
        /**** Verificando componentes foram adicionados ou retirados ****/
        // Obtendo os componentes da OS antiga
        $componentesOSAntiga = $ordemServicoAntiga->getComponentesOrdemServico();
        // Obtendo os componentes da OS Nova
        $componentesOSNova = $ordemServicoNova->getComponentesOrdemServico();

        // Organizando os componentes da OS antiga
        foreach($componentesOSAntiga as $componenteOSAntiga){
            $auxComponentesOSAntiga[$componenteOSAntiga->getIdComponente()] = $componenteOSAntiga->getQuantidade();
        }

        // Organizando os serviços da OS nova
        foreach($componentesOSNova as $componenteOSNova){
            $auxComponentesOSNova[$componenteOSNova->getIdComponente()] = $componenteOSNova->getQuantidade();
        }

        foreach($auxComponentesOSAntiga as $idComponenteAntigo => $quantidadeOSAntiga){
            // Verificando se o serviço da OS antiga ainda esta na OS nova
            if(in_array($idComponenteAntigo, array_keys($auxComponentesOSNova))){
               // Verificando se o usuário alterou a quantidade de serviços adicionados
               if($quantidadeOSAntiga > $componentesOSNova[$idComponenteAntigo]){
                    $diminuidaQuantidade['componente'][$idComponenteAntigo] = array('quantidade'=>($quantidadeOSAntiga-$componentesOSNova[$idComponenteAntigo])
                                                                    , 'registro'=>  Doctrine::getTable('Componente')->findById($idComponenteAntigo)->getFirst());
               }
               else if($quantidadeOSAntiga < $componentesOSNova[$idComponenteAntigo]){
                   $aumentadaQuantidade['componente'][$idComponenteAntigo] = array('quantidade'=>($componentesOSNova[$idComponenteAntigo]-$quantidadeOSAntiga)
                                                                    , 'registro'=>  Doctrine::getTable('Componente')->findById($idComponenteAntigo)->getFirst());
               }
            }
            else{
                $componentesRemovidos[$idComponenteAntigo] = Doctrine::getTable('Componente')->findById($idComponenteAntigo)->getFirst();
            }
        }



        return $textoObservacao;
    }


}
