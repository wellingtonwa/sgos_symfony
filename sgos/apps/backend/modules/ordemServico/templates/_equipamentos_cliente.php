<select name="ordem_servico[idEquipamento]">
    <?php if(count($dadosEquipamentos)>0): ?>
        <?php foreach ($dadosEquipamentos as $foreachEquipamento): ?>
            <option value="<?php echo $foreachEquipamento->getId(); ?>">
                <?php echo $foreachEquipamento->getNome(); ?>
            </option>
        <?php endforeach; ?>
    <?php else: ?>
        <option value="">
            nenhum equipamento
        </option>
    <?php endif; ?>
</select>