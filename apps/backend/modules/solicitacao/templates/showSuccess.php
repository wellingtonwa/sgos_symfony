<?php if($sf_user->hasFlash('error')): ?>
    <div class="ui-state-error ui-corner-all" style="padding: 0pt 0.7em;">
        <p class="none">
            <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
            <strong>Alerta: </strong><?php echo $sf_user->getFlash('Error'); ?>
        </p>
    </div>
<?php endif; ?>
<strong>Nome do solicitante: </strong><?php echo $solicitacao->getNome() ?><br/><br/>
<strong>Telefone(s) do solicitante: </strong><?php echo $solicitacao->getTelefone1(); ?> | <?php echo $solicitacao->getTelefone2() ?><br/><br/>
<strong>E-mail: </strong><?php echo $solicitacao->getEmail() ?><br/><br/>
<strong>Descrição do problema: </strong><?php echo $solicitacao->getDescricaoProblema(); ?>
<br/><br/>
<?php include_partial('show_actions', array('solicitacao'=>$solicitacao, 'ordemServico'=>$ordemServico)); ?>
