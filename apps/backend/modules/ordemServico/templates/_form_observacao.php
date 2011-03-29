<?php echo $formObservacao->getWidget('idUsuario')->render('ordem_servico[observacao][idUsuario]', $sf_user->getAttribute('user_id', null, 'sfGuardSecurityUser')) ?>
<?php echo $formObservacao->getWidget('idOrdemServico')->render('ordem_servico[observacao][idOrdemServico]', $ordem_servico->getId()) ?>

<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="observacao">Observação</label>
    <?php echo $formObservacao->getWidget('observacao')->render('ordem_servico[observacao][observacao]') ?>
    <div style="clear: both;"></div>
</div>
