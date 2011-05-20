<td colspan="3">
  <?php echo __('%%nome%% - %%sigla%% - %%Pais%%', array('%%nome%%' => link_to($estado->getNome(), 'estado_edit', $estado), '%%sigla%%' => link_to($estado->getSigla(), 'estado_edit', $estado), '%%Pais%%' => link_to($estado->getPais(), 'estado_edit', $estado)), 'messages') ?>
</td>
