<td colspan="5">
  <?php echo __('%%id%% - %%nome%% - %%significado%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($Status->getId(), 'status_edit', $Status), '%%nome%%' => $Status->getNome(), '%%significado%%' => $Status->getSignificado(), '%%created_at%%' => false !== strtotime($Status->getCreatedAt()) ? format_date($Status->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($Status->getUpdatedAt()) ? format_date($Status->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
