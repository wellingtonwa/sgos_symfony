<?php

require_once dirname(__FILE__).'/../lib/solicitacaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/solicitacaoGeneratorHelper.class.php';

/**
 * solicitacao actions.
 *
 * @package    sgos
 * @subpackage solicitacao
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitacaoActions extends autoSolicitacaoActions
{

    public function executeShow(sfWebRequest $request){

        $this->solicitacao = $this->getRoute()->getObject();

        $this->ordemServico = new OrdemServico();

        if($this->solicitacao->getIdOrdemServico()){
            $this->ordemServico = $this->solicitacao->getOrdemServico();
        }

    }

    public function  executeEdit(sfWebRequest $request) {

        $this->forward('solicitacao', 'show');

    }

    public function executeNewOS(sfWebRequest $request){

        $parametros = array_keys($this->getRoute()->getParameters());

        // Obtendo a solicitação
        $this->solicitacao = Doctrine::getTable('solicitacao')->findById($parametros[2])->getFirst();

        $this->ordemServico = new OrdemServico();

        // Verificando se a solicitação já existe
        if($this->solicitacao->getIdOrdemServico()){
            $this->ordemServico = $this->solicitacao->getOrdemServico();
            $this->getUser()->setFlash('error', 'Uma OS já foi criada a partir desta solicitação!');
        }


        /**** Verificações de cliente ****/

        // Obtendo o cliente
        $this->cliente = Doctrine::getTable('cliente')->findByEmail($this->solicitacao->getEmail())->getFirst();

        // Verificando se o cliente existe
        if(!$this->cliente){
            // Preparando para cadastrar o cliente no sistema
            $this->cliente = new Cliente();
            $this->cliente->setNome($this->solicitacao->getNome());
            $this->cliente->setEmail($this->solicitacao->getEmail());
            // Verificando se o cliente colocou os numeros de telefone
            if($this->solicitacao->getTelefone1()){
                $this->cliente->setTelefoneResidencial($this->solicitacao->getTelefone1());
            }
            if($this->solicitacao->getTelefone2()){
                $this->cliente->setTelefoneComercial($this->solicitacao->getTelefone2());
            }

            // Tentando salvar o cliente
            try{
                $this->cliente->save();
            }
            catch (Exception $e){
                $message = $e->getMessage();

                $this->getUser()->setFlash('error', $message);
            }
        }
        else{
            $this->ordemServico->setIdCliente($this->cliente->getId());
            
        }

        /**** Verificações de usuário de sistema ****/
        $this->guardUser = Doctrine::getTable("sfGuardUser")->findByEmailAddress($this->solicitacao->getEmail())->getFirst();

        // Verificando se o cliente é usuário do sistema
        if(!$this->guardUser){
            // Preparando para cadastrar o usuário do sistema
            $this->guardUser = new sfGuardUser();
            $this->guardUser->setEmailAddress($this->solicitacao->getEmail());
            $this->guardUser->setFirstName($this->solicitacao->getNome());

            // Setando o grupo do cliente
            $group = Doctrine::getTable("sfGuardGroup")->findByName('clientes')->getFirst();
            $this->groups = new sfGuardUserGroup();
            $this->groups->setGroupId($group->getId());

            try{
               // Salvando usuário do sistema
               $this->guardUser->save();
               // Setando o id do usuário
               $this->groups->setUserId($this->guardUser->getId());
               // Salvando o grupo do usuário
               $this->groups->save();
            }
            catch (Exception $e){
                $message = $e->getMessage();
                $this->getUser()->setFlash('error', $message);
            }
        }

        $this->ordemServico->setDescricaoProblema($this->solicitacao->getDescricaoProblema());
        
        try {
                $this->ordemServico->save();
            $this->solicitacao->setIdOrdemServico($this->ordemServico->getId());
            $this->solicitacao->save();
            $this->getUser()->setFlash("information", "Ordem de Serviço criada com sucesso!");
        } catch (Doctrine_Validator_Exception $e) {


            $message = $e->getMessage();
           
            $this->getUser()->setFlash('error', $message);

            
        }
        
        $this->setTemplate('show');

    }

}
