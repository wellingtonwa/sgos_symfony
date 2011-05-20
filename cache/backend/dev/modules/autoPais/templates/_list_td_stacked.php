<td colspan="2">
  <?php echo __('%%nome%% - %%sigla%%', array('%%nome%%' => link_to($pais->getNome(), 'pais_edit', $pais), '%%sigla%%' => link_to($pais->getSigla(), 'pais_edit', $pais)), 'messages') ?>
</td>
