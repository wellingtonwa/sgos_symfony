<?php

/**
 * cidade actions.
 *
 * @package    sgos
 * @subpackage cidade
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cidadeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cidades = Doctrine::getTable('Cidade')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cidade = Doctrine::getTable('Cidade')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->cidade);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CidadeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CidadeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cidade = Doctrine::getTable('Cidade')->find(array($request->getParameter('id'))), sprintf('Object cidade does not exist (%s).', $request->getParameter('id')));
    $this->form = new CidadeForm($cidade);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cidade = Doctrine::getTable('Cidade')->find(array($request->getParameter('id'))), sprintf('Object cidade does not exist (%s).', $request->getParameter('id')));
    $this->form = new CidadeForm($cidade);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cidade = Doctrine::getTable('Cidade')->find(array($request->getParameter('id'))), sprintf('Object cidade does not exist (%s).', $request->getParameter('id')));
    $cidade->delete();

    $this->redirect('cidade/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cidade = $form->save();

      $this->redirect('cidade/edit?id='.$cidade->getId());
    }
  }
}
