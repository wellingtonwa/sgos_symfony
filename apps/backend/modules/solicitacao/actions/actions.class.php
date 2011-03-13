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

    public function executeNewOS(sfWebRequest $request){

        

    }

}
