<?php

require_once dirname(__FILE__).'/../lib/ordemServicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ordemServicoGeneratorHelper.class.php';

/**
 * ordemServico actions.
 *
 * @package    sgos
 * @subpackage ordemServico
 * @author     Wellington Wagner
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ordemServicoActions extends autoOrdemServicoActions
{

    public function preExecute(){
        parent::preExecute();
    }

    public function  executeDelete(sfWebRequest $request) {
        $this->ordem_servico = $this->getRoute()->getObject();
        $this->solicitacao = $this->ordem_servico->getSolicitacao();

        try{
           $this->solicitacao->setIdOrdemServico(NULL);
           $this->solicitacao->save();
        }
        catch (Doctrine_Record_Exception $e){

            return sfView::ERROR;

        }


        parent::executeDelete($request);
    }

    // Para adicionar abrir o formulário de nova Ordem de Serviço
    public function executeNew(sfWebRequest $request){
        parent::executeNew($request);

        $this->formObservacao = new ObservacaoOrdemServicoForm();

        $this->clientes = Doctrine::getTable('Cliente')->findAll();

        if(count($this->clientes)>0)
            $this->dadosEquipamentos = Doctrine::getTable('Equipamento')->findByIdCliente($this->clientes[0]->getId());


        $this->getUser()->setAttribute('dadosServicosAdicionados', array());
        $this->getUser()->setAttribute('dadosComponentesAdicionados', array());

        $this->dadosServicos = Doctrine::getTable('Servico')->findAll();
        // Obtendo todos os serviços
        $this->dadosServicos = Doctrine::getTable('Servico')->findAll();
        $servicoPager = $this->getServicoPager();
        $this->setPageServico(1);


        $this->dadosComponentes = Doctrine::getTable('Componente')->findAll();
        // Obtendos todos os componentes
        $this->dadosComponentes = Doctrine::getTable('Componente')->findAll();
        $componentePager = $this->getComponentePager();
        $this->setPageComponente(1);


        $this->dadosForm = array('dadosServicos'=>$this->dadosServicos
                                    , 'servicoPager'=>$servicoPager
                                    , 'dadosEquipamentos'=>$this->dadosEquipamentos
                                    , 'dadosComponentes'=>$this->dadosComponentes
                                    , 'componentePager'=>$componentePager
                                    , 'clientes'=>$this->clientes
                                    , 'dadosServicosAdicionados'=>$this->getUser()->getAttribute('dadosServicosAdicionados')
                                    , 'dadosComponentesAdicionados'=>$this->getUser()->getAttribute('dadosComponentesAdicionados')
                                    , 'observacoesOrdemServico'=>null
                                    );


    }


    public function executeEdit(sfWebRequest $request)
      {

        $this->formObservacao = new ObservacaoOrdemServicoForm();

        $this->ordem_servico = $this->getRoute()->getObject();

        $this->clientes = Doctrine::getTable('Cliente')->findById($this->ordem_servico->getIdCliente());

        if(count($this->clientes)>0)
                $this->dadosEquipamentos = Doctrine::getTable('Equipamento')->findByIdCliente($this->clientes[0]->getId());

        // Criando a variavel $dadosServicosAdicionados
        $dadosServicosAdicionados = array();


        // Obtendo todos os serviços
        $this->dadosServicos = Doctrine::getTable('Servico')->findAll();
        $servicoPager = $this->getServicoPager();
        $this->setPageServico(1);


        // Obtendo os serviços a adicionados na OS
        $servicosOrdemServico = $this->ordem_servico->getServicosOrdemServico();
        // Armazenando os dados
        foreach ($servicosOrdemServico as $servicoOrdemServico){
            $dadosServicosAdicionados[$servicoOrdemServico->getIdServico()]['quantidade'] = $servicoOrdemServico->getQuantidade();
            $dadosServicosAdicionados[$servicoOrdemServico->getIdServico()]['servico'] = $servicoOrdemServico->getServico();
            $dadosServicosAdicionados[$servicoOrdemServico->getIdServico()]['registro'] = $servicoOrdemServico;
        }

        $this->getUser()->setAttribute("dadosServicosAdicionados", $dadosServicosAdicionados);

        // Salvando na sessão o registro da Ordem de Serviço para futuras
        // comparações de alterações
        $this->getUser()->setAttribute('ordem_servico', $this->ordem_servico);
        $this->getUser()->setAttribute('ordem_servico_servicos', $this->ordem_servico->getServicosOrdemServico());
        $this->getUser()->setAttribute('ordem_servico_compenentes', $this->ordem_servico->getComponentesOrdemServico());

        // Obtendos todos os componentes
        $this->dadosComponentes = Doctrine::getTable('Componente')->findAll();
        $componentePager = $this->getComponentePager();
        $this->setPageComponente(1);

        // Obtendo os componentes já adicionados na OS
        $componentesOrdemServico = $this->ordem_servico->getComponentesOrdemServico();

        // Criando o array de componentes adicionados
        $dadosComponentesAdicionados = array();
        // Armazenando os dados dos componentes já adicionados
        foreach($componentesOrdemServico as $componenteOrdemServico){
            $idComponente = $componenteOrdemServico->getIdComponente();
            // Montando um array com as informações dos componentes
            $dadosComponentesAdicionados[$idComponente] = array('quantidade'=>$componenteOrdemServico->getQuantidade(), 
                                                                'componente'=>$componenteOrdemServico->getComponente(),
                                                                'registro'=>$componenteOrdemServico);
        }

        $this->getUser()->setAttribute("dadosComponentesAdicionados", $dadosComponentesAdicionados);

        // Obtendo as observações da ordem de servico
        $observacoes = Doctrine::getTable('ObservacaoOrdemServico')->findByOrdemServico($this->ordem_servico->getId());

        $this->dadosForm = array('dadosServicos'=>$this->dadosServicos
                                    , 'servicoPager'=>$servicoPager
                                    , 'dadosEquipamentos'=>$this->dadosEquipamentos
                                    , 'dadosComponentes'=>$this->dadosComponentes
                                    , 'componentePager'=>$componentePager
                                    , 'clientes'=>$this->clientes
                                    , 'dadosServicosAdicionados'=>$this->getUser()->getAttribute('dadosServicosAdicionados')
                                    , 'dadosComponentesAdicionados'=>$this->getUser()->getAttribute('dadosComponentesAdicionados')
                                    , 'observacoesOrdemServico'=>$observacoes
                                    );

        $this->form = $this->configuration->getForm($this->ordem_servico);

      }




  protected function processForm(sfWebRequest $request, sfForm $form)
  {

    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {        
        $ordem_servico = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);

        return sfView::SUCCESS;
      }

      
      // Verificando os Serviços adicionados na ordem de serviço
      $dadosServicosAdicionados = $this->getUser()->getAttribute('dadosServicosAdicionados');

      if($dadosServicosAdicionados){
          foreach($dadosServicosAdicionados as $servicoAdicionado){

              if($servicoAdicionado['registro']){
                  $servicoOrdemServico = $servicoAdicionado['registro'];
              }
              else
                  $servicoOrdemServico = new ServicoOrdemServico();

              $servicoOrdemServico->setIdOrdemServico($ordem_servico->getId());
              $servicoOrdemServico->setIdServico($servicoAdicionado['servico']->getId());
              $servicoOrdemServico->setQuantidade($servicoAdicionado['quantidade']);
              if($servicoOrdemServico->getQuantidade() != 0)
                $servicoOrdemServico->save();
              else
                $servicoOrdemServico->delete();
          }
      }
      else{
          $servicosOrdemServico = Doctrine::getTable('ServicoOrdemServico')->findBy('idordemservico', $ordem_servico->getId());
          if($servicosOrdemServico->count()>0)
            foreach($servicosOrdemServico as $servicoOrdemServico)
                $servicoOrdemServico->delete();
      }

      // Verificando os Componentes adicionados na ordem de serviço

      $dadosComponentesAdicionados = $this->getUser()->getAttribute('dadosComponentesAdicionados');

      if($dadosComponentesAdicionados){
          foreach($dadosComponentesAdicionados as $componenteAdicionado){

              if($componenteAdicionado['registro']){
                  $componenteOrdemServico = $componenteAdicionado['registro'];
              }
              else
                  $componenteOrdemServico = new ComponenteOrdemServico();


              $componenteOrdemServico->setIdOrdemServico($ordem_servico->getId());
              $componenteOrdemServico->setIdComponente($componenteAdicionado['componente']->getId());
              $componenteOrdemServico->setQuantidade($componenteAdicionado['quantidade']);

              if($componenteOrdemServico->getQuantidade() !=0)
                $componenteOrdemServico->save();
              else
                $componenteOrdemServico->delete();
              
          }

          //$observacaoAction = new observacaoOrdemServicoActions();
          //$observacaoAction->salvarObservacao($request, $form);
      }
      else{
           $componentesOrdemServico = Doctrine::getTable('ComponenteOrdemServico')->findBy('idordemservico', $ordem_servico->getId());
           if($componentesOrdemServico->count()>0)
               foreach($componentesOrdemServico as $componenteOrdemServico)
                    $componenteOrdemServico->delete();
           
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ordem_servico)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@ordem_servico_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'ordem_servico_edit', 'sf_subject' => $ordem_servico));
      }
    }
    else
    {
      echo $form->getErrorSchema()->getMessage();
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }

  }

    public function executeChangeCliente(sfWebRequest $request){

        $idCliente = $request->getParameter('idCliente');

        $dadosEquipamentos = Doctrine::getTable('Equipamento')->findByidCliente($idCliente);

        return $this->renderPartial('equipamentos_cliente', array('dadosEquipamentos'=>$dadosEquipamentos));

    }

     public function executeIndex(sfWebRequest $request){

        $this->getUser()->setAttribute('dadosServicosAdicionados', array());

        parent::executeIndex($request);
    }

    public function executeAddServicoOS(sfWebRequest $request){

        $idServico = $request->getParameter('idServico');

        $dadosServicosAdicionados = $this->getUser()->getAttribute('dadosServicosAdicionados');

        if(isset($dadosServicosAdicionados[$idServico])){
           $dadosServicosAdicionados[$idServico]['quantidade'] += 1;
        }
        else{
            $dadosServicosAdicionados[$idServico]['servico'] = Doctrine::getTable('Servico')->findOneById($idServico);
            $dadosServicosAdicionados[$idServico]['quantidade'] = 1;
        }

        $this->getUser()->setAttribute('dadosServicosAdicionados', $dadosServicosAdicionados);

        return $this->renderPartial('servicos_ordem_servico', array('dadosServicosAdicionados'=>$dadosServicosAdicionados));

    }

    public function executeAddComponenteOS(sfWebRequest $request){

        $idComponente = $request->getParameter('idComponente');

        $dadosComponentesAdicionados = $this->getUser()->getAttribute('dadosComponentesAdicionados');
        if(isset($dadosComponentesAdicionados[$idComponente])){
           $dadosComponentesAdicionados[$idComponente]['quantidade'] += 1;
        }
        else{
            $dadosComponentesAdicionados[$idComponente]['componente'] = Doctrine::getTable('Componente')->findOneById($idComponente);
            $dadosComponentesAdicionados[$idComponente]['quantidade'] = 1;
        }
        $this->getUser()->setAttribute('dadosComponentesAdicionados', $dadosComponentesAdicionados);

        return $this->renderPartial('componentes_ordem_servico', array('dadosComponentesAdicionados'=>$dadosComponentesAdicionados));

    }

     public function executeRemServicoOS(sfWebRequest $request){

        $idServico = $idServico = $request->getParameter('idServico');

        $dadosServicosAdicionados = $this->getUser()->getAttribute('dadosServicosAdicionados');

        if(isset($dadosServicosAdicionados[$idServico]) && $dadosServicosAdicionados[$idServico]['quantidade'] > 0){
           $dadosServicosAdicionados[$idServico]['quantidade'] -= 1;
        }
        else{
            $dadosServicosAdicionados[$idServico]['quantidade'] = 0;
        }

        if($dadosServicosAdicionados[$idServico]['quantidade'] == 0)
            unset($dadosServicosAdicionados[$idServico]);

        $this->getUser()->setAttribute('dadosServicosAdicionados', $dadosServicosAdicionados);

        return $this->renderPartial('servicos_ordem_servico', array('dadosServicosAdicionados'=>$dadosServicosAdicionados));

    }

     public function executeRemComponenteOS(sfWebRequest $request){

        $idComponente =  $request->getParameter('idComponente');

        $dadosComponentesAdicionados = $this->getUser()->getAttribute('dadosComponentesAdicionados');

        if(isset($dadosComponentesAdicionados[$idComponente]) && $dadosComponentesAdicionados[$idComponente]['quantidade'] > 0){
           $dadosComponentesAdicionados[$idComponente]['quantidade'] -= 1;
        }
        else{
            $dadosComponentesAdicionados[$idComponente]['quantidade'] = 0;
        }

        if($dadosComponentesAdicionados[$idComponente]['quantidade'] == 0)
            unset($dadosComponentesAdicionados[$idComponente]);

        $this->getUser()->setAttribute('dadosComponentesAdicionados', $dadosComponentesAdicionados);

        return $this->renderPartial('componentes_ordem_servico', array('dadosComponentesAdicionados'=>$dadosComponentesAdicionados));

    }


    public function executePesquisaServico(sfWebRequest $request){

        $nomePesquisado = $request->getParameter('query');

        $pagina = $request->getParameter('page');

        $this->setPageServico($pagina);

        $servicoPager = $this->getServicoPager($nomePesquisado);


        $query = Doctrine::getTable('Servico')->pesquisarNomeComecandoCom($nomePesquisado);
        return $this->renderPartial('lista_servicos', array('dadosServicos'=>$query->execute(), 'servicoPager'=>$servicoPager));

    }

    public function getServicoPager($nomePesquisado = ''){
        $pager = $this->configuration->getPager('servico');
        $pager->setQuery(Doctrine::getTable('Servico')->pesquisarNomeComecandoCom($nomePesquisado));
        $pager->setPage($this->getPageServico());
        $pager->setMaxPerPage(7);
        $pager->init();

        return $pager;
    }

    public function getPageServico(){
        return $this->getUser()->getAttribute("servico_page", 1, 'paginacao_admin');
    }

    public function setPageServico($pagina){
        return $this->getUser()->setAttribute("servico_page", $pagina, 'paginacao_admin');
    }

    public function executePesquisaComponente(sfWebRequest $request){

        $nomePesquisado = $request->getParameter('query');
        
        $componentePager = $this->getComponentePager($nomePesquisado);

        $dadosComponentes = Doctrine::getTable('Componente')->pesquisarNomeComecandoCom($nomePesquisado);
        return $this->renderPartial('lista_componentes', array('dadosComponentes'=>$dadosComponentes, 'componentePager'=>$componentePager));

    }

    public function getComponentePager($nomePesquisado = ''){
        $pager = $this->configuration->getPager('componente');
        $pager->setQuery(Doctrine::getTable('Componente')->pesquisarNomeComecandoCom($nomePesquisado));
        $pager->setPage($this->getPageComponente());
        $pager->setMaxPerPage(7);
        $pager->init();

        return $pager;
    }

    public function getPageComponente(){
        return $this->getUser()->getAttribute("componente_page", 1, 'paginacao_admin');
    }

    public function setPageComponente($pagina){
        return $this->getUser()->setAttribute("componente_page", $pagina, 'paginacao_admin');
    }

    protected function getPager()
    {
        $pager = $this->configuration->getPager('OrdemServico');
        if($this->getUser()->hasCredential('funcionario') || $this->getUser()->hasCredential('admin')){
            $pager->setQuery($this->buildQuery());
        }
        else{
            $idUsuarioSistema = $this->getUser()->getAttribute('user_id', null, 'sfGuardSecurityUser');
            $cliente = Doctrine::getTable('Cliente')->findOneByIdUsuario($idUsuarioSistema);
            $pager->setQuery($this->buildQueryCliente($cliente->getId()));
        }
        

        $pager->setPage($this->getPage());
        $pager->init();

        return $pager;
    }


  protected function buildQueryCliente($idCliente)
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = Doctrine::getTable('OrdemServico')->getOrdemServicoCliente($idCliente);

    return $query;
  }
}
