<?php if(!$solicitacao->getIdOrdemServico()): ?>
    <a href="<?php echo url_for("solicitacao_newOS", $solicitacao) ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class='ui-button-text'>Abrir uma OS com esta solicitação</span></a>
<?php else: ?>
    <a href="<?php echo url_for("ordem_servico_edit", $ordemServico) ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only"><span class='ui-button-text'>Abrir a OS desta solicitação</span></a>
<?php endif; ?>
<a href="<?php echo url_for('solicitacao'); ?>" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
    <span class="ui-button-text">
       Voltar
    </span>
</a>