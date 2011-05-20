<td colspan="2">
  <?php echo __('%%nome%% - %%estado%%', array('%%nome%%' => link_to($cidade->getNome(), 'cidade_cidade_edit', $cidade), '%%estado%%' => $cidade->getEstado()), 'messages') ?>
</td>
