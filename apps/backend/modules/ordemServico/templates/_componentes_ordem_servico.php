<?php $total = 0; ?>
<table width="100%">
    <tr>
        <td colspan="4" style="background: #8f8f8f">
            Componentes Adicionados
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
    <?php if($dadosComponentesAdicionados->count()>0): ?>
        <?php foreach ($dadosComponentesAdicionados as $foreachComponenteAdicionado): ?>
            <?php $total += $foreachComponenteAdicionado['componente'] ->getPreco() * $foreachComponenteAdicionado['quantidade']; ?>
            <tr>
                <td>
                    <?php echo $foreachComponenteAdicionado['componente']->getNome() ?>
                </td>
                <td>
                    <?php echo $foreachComponenteAdicionado['componente'] ->getPreco();?>
                </td>
                <td>
                    <?php echo $foreachComponenteAdicionado['quantidade']?>
                </td>
                <td width="15px">
                    <div class="ui-state-default ui-corner-all">
                        <div class="ui-icon ui-icon-circle-minus" title="Remover componente da ordem de serviço" style="cursor: pointer" onclick="$('#componentesAdicionados').load('<?php echo url_for('ordemServico_removeComponente') ?>', {idComponente: <?php echo $foreachComponenteAdicionado['componente'] ->getId(); ?>})">
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
                <i>Nenhum componente adicionado</i>
            </td>
        </tr>
    <?php endif; ?>
</table>