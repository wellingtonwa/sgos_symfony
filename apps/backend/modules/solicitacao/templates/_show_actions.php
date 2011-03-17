<?php if(!$solicitacao->getIdOrdemServico()): ?>
    <?php echo link_to2("Abrir uma OS com esta solicitação", "solicitacao_newOS", $solicitacao, array('class'=>'ui-state-default ui-corner-all')) ?>
<?php else: ?>
    <?php echo link_to("Abrir a OS desta solicitação", "ordem_servico_edit", $ordemServico, array('class'=>'ui-state-default ui-corner-all')) ?>
<?php endif; ?>
&nbsp;&nbsp; | &nbsp;&nbsp;<?php echo link_to("Voltar", "solicitacao", array('class'=>'ui-state-default ui-corner-all'));