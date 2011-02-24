<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Status->getId(), 'status_edit', $Status) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nome">
  <?php echo $Status->getNome() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_significado">
  <?php echo $Status->getSignificado() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($Status->getCreatedAt()) ? format_date($Status->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($Status->getUpdatedAt()) ? format_date($Status->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
