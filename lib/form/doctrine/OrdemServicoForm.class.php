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
      $this->validatorSchema['observacao']['idOrdemServico']->setOption('required', false);
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
            
            if($form->getModelName() == 'ObservacaoOrdemServico' && $this->isNew() == false){
                 $textoAlteracao = $this->getDiffOrdemServico();
                 if(trim($form->getObject()->getObservacao()) || empty($textoAlteracao)==false){
                    $form->getObject()->setStatus($status);
                    $textoObservacao = $form->getObject()->getObservacao();
                    $textoAlteracao .= empty($textoObservacao) ? '' : '<br><br>Observação do Técnico:<br>';
                    $form->getObject()->setObservacao($textoAlteracao.$textoObservacao);
                    $form->getObject()->save($con);
                 }
            }
        }

        //parent::saveEmbeddedForms($con, $forms);
    }

    public function getDiffOrdemServico(){        

        $textoObservacao = $this->verificaAlteracaoStatus();
        $textoObservacao .= $this->verificaAlteracoesServicos($textoObservacao);
        $textoObservacao .= $this->verificaAlteracoesComponentes($textoObservacao);

        return $textoObservacao;
    }

    public function verificaAlteracaoStatus($textoObservacao = null){

        $sfUser = sfContext::getInstance()->getUser();

        /**** Verificando os servicos adicionados ou retirados ****/
        // Obtendo os dados da ordem de serviço nova
        $ordemServicoNova = $this->getObject();
        // Obtendo os dados da ordem de serviço antiga
        $ordemServicoAntiga = $sfUser->getAttribute('ordem_servico');

        // Verificando se o usuário alterou o status
        if($ordemServicoAntiga->getStatus() != $ordemServicoNova->getStatus()){
            $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
            $textoObservacao .= '- Status alterado de '.$ordemServicoAntiga->getStatus().' para '.$ordemServicoNova->getStatus();
        }

        return $textoObservacao;
    }

    public function verificaAlteracoesServicos(&$textoObservacao = null){
        $sfUser = sfContext::getInstance()->getUser();

        // Obtendo os dados da ordem de serviço nova
        $ordemServicoNova = $this->getObject();
        // Obtendo os dados da ordem de serviço antiga
        $ordemServicoAntiga = $sfUser->getAttribute('ordem_servico');

        /**** Verificando os servicos adicionados ou retirados ****/
        // Obtendo os servicos da OS antiga
        $servicosOSAntiga = $sfUser->getAttribute('ordem_servico_servicos');
        // Obtendo os servicos da OS Nova
        $auxServicosOSNova = $sfUser->getAttribute('dadosServicosAdicionados');

        // Organizando os serviços da OS nova
        foreach($servicosOSAntiga as $servicoOSAntiga){
            $auxServicosOSAntiga[$servicoOSAntiga->getIdServico()] = (int) $servicoOSAntiga->getQuantidade();
        }

        foreach($auxServicosOSAntiga as $idServicoAntigo => $forDadosServicoOSAntiga){

            // Verificando se o serviço da OS antiga ainda esta na OS nova
            if(in_array($idServicoAntigo, array_keys($auxServicosOSNova))){
               // Verificando se o usuário alterou a quantidade de serviços adicionados
               if($forDadosServicoOSAntiga > $auxServicosOSNova[$idServicoAntigo]['quantidade'] || $forDadosServicoOSAntiga < $auxServicosOSNova[$idServicoAntigo]['quantidade']){
                   $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
                   $registro = Doctrine::getTable('Servico')->findOneById($idServicoAntigo);

                   $novaQuantidade = $forDadosServicoOSAntiga-$auxServicosOSNova[$idServicoAntigo]['quantidade'];
                   if($novaQuantidade <=0)
                       $novaQuantidade = $auxServicosOSNova[$idServicoAntigo]['quantidade'];

                   $textoObservacao .= "- O técnico alterou a quantidade do serviço ".$registro->getNome()." de ".$forDadosServicoOSAntiga.' para '.$novaQuantidade;
               }
            }
            else{
               $registro = Doctrine::getTable('Servico')->findOneById($idServicoAntigo);
               $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
               $textoObservacao .= "- O técnico removeu o serviço \"".$registro->getNome()."\"";
            }
            unset($auxServicosOSNova[$idServicoAntigo]);
        }
        foreach ($auxServicosOSNova as $idServicoNovo=>$servicoOSNova){
            $registro = Doctrine::getTable('Servico')->findOneById($idServicoNovo);
            $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
            $textoObservacao .= "- O técnico adicionou o serviço \"".$registro->getNome()."\"";
        }
    }

    public function verificaAlteracoesComponentes(&$textoObservacao = null){

        $sfUser = sfContext::getInstance()->getUser();

        // Obtendo os dados da ordem de serviço nova
        $ordemServicoNova = $this->getObject();
        

        /**** Verificando componentes foram adicionados ou retirados ****/
        // Obtendo os componentes da OS antiga
        $componentesOSAntiga = $sfUser->getAttribute('ordem_servico_compenentes');
        // Obtendo os componentes da OS Nova
        $auxComponentesOSNova = $sfUser->getAttribute('dadosComponentesAdicionados');

        // Organizando os serviços da OS nova
        foreach($componentesOSAntiga as $componenteOSAntiga){
            $auxComponentesOSAntiga[$componenteOSAntiga->getIdComponente()] = (int) $componenteOSAntiga->getQuantidade();
        }
       
        foreach($auxComponentesOSAntiga as $idComponenteAntigo => $forDadosComponenteOSAntiga){
            // Verificando se o serviço da OS antiga ainda esta na OS nova
            if(in_array($idComponenteAntigo, array_keys($auxComponentesOSNova))){
               // Verificando se o usuário alterou a quantidade de serviços adicionados
               if($forDadosComponenteOSAntiga > $componentesOSNova[$idComponenteAntigo]['quantidade'] || $forDadosComponenteOSAntiga < $componentesOSNova[$idComponenteAntigo]['quantidade']){
                   echo "Lkjalkdjaslda<br>";
                   $registro = Doctrine::getTable('Componente')->findOneById($idComponenteAntigo);
                   $novaQuantidade = $forDadosComponenteOSAntiga-$componentesOSNova[$idComponenteAntigo]['quantidade'];
                   if($novaQuantidade <=0)
                       $novaQuantidade = $componentesOSNova[$idComponenteAntigo]['quantidade'];
                   $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
                   $textoObservacao .= "- O técnico alterou a quantidade do serviço \"".$registro->getNome()."\" de ".$forDadosComponenteOSAntiga.' para '.$novaQuantidade['quantidade'];

                   
               }
            }
            else{
                $registro = Doctrine::getTable('Componente')->findOneById($idComponenteAntigo);

                $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
                $textoObservacao .= "- O técnico removeu o componente \"".$registro->getNome()."\"";
            }
            unset($componentesOSNova[$idComponenteAntigo]);
        }

        // Verificando se foi adicionado algum componente
        foreach($componentesOSNova as $idComponenteNovo=>$componenteOSNova){
            $textoObservacao .= empty($textoObservacao) ? '' : '<br>';
            $registro = Doctrine::getTable('Componente')->findOneById($idComponenteNovo);
            $textoObservacao .= "- O técnico adicionou o componente \"".$registro->getNome()."\"";
        }
    }


}
