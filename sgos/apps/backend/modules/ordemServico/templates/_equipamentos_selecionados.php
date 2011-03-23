<?php if( !$sf_user->getAttribute('lista_equipamento_selecionado') ): ?>
    <div>Selecione um equipamento na list ao lado</div>
<?php else: ?>
    <?php foreach ($sf_user->getAttribute('lista_equipamento_selecionado') as $idEquipamento=>$equipamento): ?>
        <div><?php echo $equipamento->getNome(); ?></div>
    <?php endforeach; ?>
<?php endif; ?>
