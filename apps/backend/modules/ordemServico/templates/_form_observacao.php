<?php $widgets = $form->getWidgetSchema(); ?>

<?php echo $widgets['observacao']['idUsuario']->render('ordem_servico[observacao][idUsuario]', $sf_user->getAttribute('user_id', null, 'sfGuardSecurityUser')) ?>
<?php echo $widgets['observacao']['idOrdemServico']->render('ordem_servico[observacao][idOrdemServico]', $ordem_servico->getId()) ?>
<?php echo $widgets['observacao']['status']->render('ordem_servico[observacao][status]') ?>


<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="observacao">Observação</label>
    <?php echo $widgets['observacao']['observacao']->render('ordem_servico[observacao][observacao]') ?>
    <div style="clear: both;"></div>
</div>
