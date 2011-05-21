<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($ordem_servico->getId(), 'ordem_servico_edit', $ordem_servico) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_idCliente">
  <?php echo $ordem_servico->getIdCliente() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_idEquipamento">
  <?php echo $ordem_servico->getIdEquipamento() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_status">
  <?php echo $ordem_servico->getStatus() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_descricao_problema">
  <?php echo $ordem_servico->getDescricaoProblema() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($ordem_servico->getCreatedAt()) ? format_date($ordem_servico->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($ordem_servico->getUpdatedAt()) ? format_date($ordem_servico->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
