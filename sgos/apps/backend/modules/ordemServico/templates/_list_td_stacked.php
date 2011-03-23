<td colspan="4">
  <?php echo __('%%id%% - %%idCliente%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($ordem_servico->getId(), 'ordem_servico_edit', $ordem_servico), '%%idCliente%%' => $ordem_servico->getIdCliente(), '%%created_at%%' => false !== strtotime($ordem_servico->getCreatedAt()) ? format_date($ordem_servico->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($ordem_servico->getUpdatedAt()) ? format_date($ordem_servico->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
