<?php include_partial('ordemServico/assets') ?>

<script>
    // Accordion
    $(function() {
        $("#accordion").accordion({ header: "h3" });
    });

</script>

<div id="sf_admin_container">
    <table id="sf_fieldset_none">
        <tbody>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Nome do Cliente: </strong>
                </td>
                <td>
                    <?php echo $ordem_servico->getCliente()->getNome() ?>
                </td>
            </tr>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Equipamento: </strong>
                </td>
                <td>
                    <?php if($ordem_servico->getIdEquipamento()): 
                                echo $ordem_servico->getEquipamento()->nome();
                          else:
                                echo "Nenhum Equipamento";
                          endif;
                    ?>
                </td>
            </tr>
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Status: </strong>
                </td>
                <td>
                    <?php echo $ordem_servico->getStatus() ?>
                </td>
            </tr>
            
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Descrição do problema: </strong>
                </td>
                <td>
                    <?php echo $ordem_servico->getDescricaoProblema(); ?>
                </td>
            </tr>
            
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Serviços: </strong>
                </td>
                <td>
                    <?php if($ordem_servico->getServicos()->count() > 0): ?>
                        <?php $servicos = $ordem_servico->getServicos()  ?>
                        <?php foreach($servicos as $servico): ?>
                            <?php echo "-".$servico->getNome()." - R$".$servico->getPreco()."<br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </td>
            </tr>
        
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Componentes: </strong>
                </td>
                <td>
                    <?php if($ordem_servico->getComponentes()->count() > 0): ?>
                        <?php $componentes = $ordem_servico->getComponentes()  ?>
                        <?php foreach($componentes as $componente): ?>
                            <?php echo "-".$componente->getNome()." - R$".$componente->getPreco()."<br>"; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </td>
            </tr>
        
            <tr class="sf_admin_form_row sf_admin_enum sf_admin_filter_field_status">
                <td>
                    <strong>Observações: </strong>
                </td>
                <td>
                    <?php include_partial('historico_observacao', array('observacoesOrdemServico'=>$observacoesOrdemServico)) ?>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
<?php include_partial('show_actions', array()); ?>
