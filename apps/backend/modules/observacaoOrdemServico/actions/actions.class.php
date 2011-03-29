<?php

/**
 * observacaoOrdemServico actions.
 *
 * @package    sgos
 * @subpackage observacaoOrdemServico
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class observacaoOrdemServicoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->observacao_ordem_servicos = Doctrine::getTable('ObservacaoOrdemServico')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ObservacaoOrdemServicoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ObservacaoOrdemServicoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($observacao_ordem_servico = Doctrine::getTable('ObservacaoOrdemServico')->find(array($request->getParameter('id'))), sprintf('Object observacao_ordem_servico does not exist (%s).', $request->getParameter('id')));
    $this->form = new ObservacaoOrdemServicoForm($observacao_ordem_servico);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($observacao_ordem_servico = Doctrine::getTable('ObservacaoOrdemServico')->find(array($request->getParameter('id'))), sprintf('Object observacao_ordem_servico does not exist (%s).', $request->getParameter('id')));
    $this->form = new ObservacaoOrdemServicoForm($observacao_ordem_servico);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($observacao_ordem_servico = Doctrine::getTable('ObservacaoOrdemServico')->find(array($request->getParameter('id'))), sprintf('Object observacao_ordem_servico does not exist (%s).', $request->getParameter('id')));
    $observacao_ordem_servico->delete();

    $this->redirect('observacaoOrdemServico/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $observacao_ordem_servico = $form->save();

      $this->redirect('observacaoOrdemServico/edit?id='.$observacao_ordem_servico->getId());
    }
  }


  /**
   * Trata as informações recebidas do formulário de Ordem de Servico
   *
   * @param sfWebRequest $request
   * @param sfForm $form
   */
  public function salvarObservacao(sfWebRequest $request, sfForm $form){

    echo "lasdlkjasldkjas";

  }

}
