<?php

require_once dirname(__FILE__).'/../lib/clienteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clienteGeneratorHelper.class.php';

/**
 * cliente actions.
 *
 * @package    sgos
 * @subpackage cliente
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends autoClienteActions
{
    public function preExecute(){
        echo $this->getUser()->setCulture('pt_BR');
        parent::preExecute();
    }
    
    public function executeShow(sfWebRequest $request){

        $this->cliente = $this->getRoute()->getObject();

    }
}
