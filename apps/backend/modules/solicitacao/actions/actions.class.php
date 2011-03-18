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

        $this->solicitacao = Doctrine::getTable('solicitacao')->findById($parametros[2])->getFirst();

        $this->ordemServico = new OrdemServico();

        if($this->solicitacao->getIdOrdemServico()){
            $this->ordemServico = $this->solicitacao->getOrdemServico();
            $this->getUser()->setFlash('error', 'Uma OS já foi criada a partir desta solicitação!');
        }




        $this->cliente = Doctrine::getTable('cliente')->findByEmail($this->solicitacao->getEmail())->getFirst();

        $this->ordemServico->setIdCliente($this->cliente->getId());
        $this->ordemServico->setDescricaoProblema($this->solicitacao->getDescricaoProblema());

        try {
            $this->ordemServico->save();
            $this->solicitacao->setIdOrdemServico($this->ordemServico->getId());
            $this->solicitacao->save();
        } catch (Doctrine_Validator_Exception $e) {


            $message = $e->getMessage();
           
            $this->getUser()->setFlash('error', $message);

            
        }
        
        $this->setTemplate('show');

    }

}
