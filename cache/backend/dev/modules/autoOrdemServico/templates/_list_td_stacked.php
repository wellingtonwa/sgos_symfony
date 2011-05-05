<td colspan="3">
  <?php echo __('%%id%% - %%cliente%% - %%equipamento%%', array('%%id%%' => link_to($ordem_servico->getId(), 'ordem_servico_edit', $ordem_servico), '%%cliente%%' => $ordem_servico->getCliente(), '%%equipamento%%' => $ordem_servico->getEquipamento()), 'messages') ?>
</td>
