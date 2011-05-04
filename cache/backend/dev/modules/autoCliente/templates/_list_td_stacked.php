<td colspan="5">
  <?php echo __('%%nome%% - %%email%% - %%telefoneResidencial%% - %%telefoneComercial%% - %%cidade%%', array('%%nome%%' => link_to($cliente->getNome(), 'cliente_edit', $cliente), '%%email%%' => link_to($cliente->getEmail(), 'cliente_edit', $cliente), '%%telefoneResidencial%%' => link_to($cliente->getTelefoneResidencial(), 'cliente_edit', $cliente), '%%telefoneComercial%%' => link_to($cliente->getTelefoneComercial(), 'cliente_edit', $cliente), '%%cidade%%' => link_to($cliente->getCidade(), 'cliente_edit', $cliente)), 'messages') ?>
</td>
