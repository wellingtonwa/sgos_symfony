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

    }

    public function  executeEdit(sfWebRequest $request) {

        $this->forward('solicitacao', 'show');

    }

    public function executeNewOS(sfWebRequest $request){

        $parametros = array_keys($this->getRoute()->getParameters());

        $this->solicitacao = Doctrine::getTable('solicitacao')->findById($parametros[2])->getFirst();

        $this->ordemServico = new OrdemServico();

        $this->cliente = Doctrine::getTable('cliente')->findByEmail($this->solicitacao->getEmail())->getFirst();

    }

}
