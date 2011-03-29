<?php include_partial('solicitacao/assets') ?>
<?php if($sf_user->hasFlash('error')): ?>
    <div class="ui-state-error ui-corner-all" style="padding: 0pt 0.7em;">
        <p class="none">
            <span class="ui-icon ui-icon-alert" style="float: left; margin-right: 0.3em;"></span>
            <strong>Alerta: </strong><?php echo $sf_user->getFlash('error'); ?>
        </p>
    </div>
<?php endif; ?>
<?php if($sf_user->hasFlash('information')): ?>
    <div class="ui-state-highlight ui-corner-all" style="padding: 0pt 0.7em;">
        <p class="none">
            <span class="ui-icon ui-icon-info" style="float: left; margin-right: 0.3em;"></span>
            <strong>Informação: </strong><?php echo $sf_user->getFlash('information'); ?>
        </p>
    </div>
<?php endif; ?>

<div id="sf_admin_container">
    <table id="sf_fieldset_none">
        <tbody>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Nome do solicitante: </strong>
                </td>
                <td>
                    <?php echo $solicitacao->getNome() ?>
                </td>
            </tr>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Telefone(s) do solicitante: </strong>
                </td>
                <td>
                    <?php echo $solicitacao->getTelefone1(); ?> | <?php echo $solicitacao->getTelefone2() ?>
                </td>
            </tr>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>E-mail: </strong>
                </td>
                <td>
                    <?php echo $solicitacao->getEmail() ?>
                </td>
            </tr>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Descrição do problema: </strong>
                </td>
                <td>
                    <?php echo $solicitacao->getDescricaoProblema(); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include_partial('show_actions', array('solicitacao'=>$solicitacao, 'ordemServico'=>$ordemServico)); ?>
