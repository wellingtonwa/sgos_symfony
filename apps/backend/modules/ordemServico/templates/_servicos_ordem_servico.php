<?php $total = 0; ?>
<table width="100%">
    <tr>
        <td colspan="4" style="background: #8f8f8f">
            Serviços Adicionados
        </td>
    </tr>
    <tr style="background: #afafaf">
        <td>
            Nome
        </td>
        <td>
            Preço
        </td>
        <td colspan="2">
            Qtd.
        </td>
    </tr>
    <?php if($dadosServicosAdicionados->count()>0): ?>
        <?php foreach ($dadosServicosAdicionados as $foreachServicoAdicionado): ?>
            <?php $total += $foreachServicoAdicionado['servico'] ->getPreco() * $foreachServicoAdicionado['quantidade']; ?>
            <tr>
                <td>
                    <?php echo $foreachServicoAdicionado['servico']->getNome() ?>
                </td>
                <td>
                    <?php echo $foreachServicoAdicionado['servico'] ->getPreco();?>
                </td>
                <td>
                    <?php echo $foreachServicoAdicionado['quantidade']?>
                </td>
                <td width="15px">
                    <div class="ui-state-default ui-corner-all">
                        <div class="ui-icon ui-icon-circle-minus" title="Remover Serviço da ordem de serviço" style="cursor: pointer" onclick="$('#servicosAdicionados').load('<?php echo url_for('ordemServico_removeServico') ?>', {idServico: <?php echo $foreachServicoAdicionado['servico'] ->getId(); ?>})">
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td>
               Total:
            </td>
            <td colspan="3">
                <?php echo 'R$ '. number_format($total, 2); ?>
            </td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="4">
                <i>Nenhum serviço adicionado</i>
            </td>
        </tr>
    <?php endif; ?>
</table>