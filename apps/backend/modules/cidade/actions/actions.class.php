<?php

require_once dirname(__FILE__).'/../lib/cidadeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cidadeGeneratorHelper.class.php';

/**
 * cidade actions.
 *
 * @package    sgos
 * @subpackage cidade
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cidadeActions extends autoCidadeActions
{
    
    public function executeShow(sfWebRequest $request){

        $this->cidade = $this->getRoute()->getObject();

    }
    
}
