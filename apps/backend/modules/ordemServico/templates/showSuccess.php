<?php include_partial('ordemServico/assets') ?>

<div id="sf_admin_container">
    <table id="sf_fieldset_none">
        <tbody>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Nome do Cliente: </strong>
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
