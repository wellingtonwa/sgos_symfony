<?php

/**
 * pais actions.
 *
 * @package    sgos
 * @subpackage pais
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paisActions extends autoPaisActions
{

    public function preExecute(){
        echo $this->getUser()->setCulture('pt_BR');
        parent::preExecute();
    }
  
}
