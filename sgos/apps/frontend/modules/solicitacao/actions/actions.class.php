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

  public function executeIndex(sfWebRequest $request)
  {
    $this->solicitacaos = Doctrine::getTable('Solicitacao')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->solicitacao = Doctrine::getTable('Solicitacao')->find($this->getUser()->getAttribute('frontend.solicitacao.show'));
    $this->forward404Unless($this->solicitacao);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SolicitacaoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SolicitacaoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($solicitacao = Doctrine::getTable('Solicitacao')->find(array($request->getParameter('id'))), sprintf('Object solicitacao does not exist (%s).', $request->getParameter('id')));
    $this->form = new SolicitacaoForm($solicitacao);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($solicitacao = Doctrine::getTable('Solicitacao')->find(array($request->getParameter('id'))), sprintf('Object solicitacao does not exist (%s).', $request->getParameter('id')));
    $this->form = new SolicitacaoForm($solicitacao);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($solicitacao = Doctrine::getTable('Solicitacao')->find(array($request->getParameter('id'))), sprintf('Object solicitacao does not exist (%s).', $request->getParameter('id')));
    //$solicitacao->delete();

    $this->redirect('solicitacao/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $solicitacao = $form->save();

      $this->getUser()->setAttribute('frontend.solicitacao.show', $solicitacao->getId());

      $this->getUser()->setFlash('notice', "Sua solicitação foi enviada. Por favor aguarde o retorno.");

      $this->redirect('@solicitacao_show');
    }
  }
}
