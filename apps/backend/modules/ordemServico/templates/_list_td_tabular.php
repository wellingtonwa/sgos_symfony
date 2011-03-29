<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($ordem_servico->getId(), 'ordem_servico_edit', $ordem_servico) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_idCliente">
  <?php echo $ordem_servico->getCliente() ?>
</td>
