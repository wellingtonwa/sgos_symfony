<?php

/**
 * solicitacao actions.
 *
 * @package    sgos
 * @subpackage solicitacao
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitacaoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new SolicitacaoForm();
  }
}
