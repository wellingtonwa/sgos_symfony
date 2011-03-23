<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($ordem_servico->getId(), 'ordem_servico_edit', $ordem_servico) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cliente">
  <?php echo $ordem_servico->getCliente() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_equipamento">
  <?php echo $ordem_servico->getEquipamento() ?>
</td>
