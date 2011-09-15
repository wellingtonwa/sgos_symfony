<td class="sf_admin_text sf_admin_list_td_nome">
  <?php echo link_to($cliente->getNome(), 'cliente_edit', $cliente) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo link_to($cliente->getEmail(), 'cliente_edit', $cliente) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefoneResidencial">
  <?php echo link_to($cliente->getTelefoneResidencial(), 'cliente_edit', $cliente) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefoneComercial">
  <?php echo link_to($cliente->getTelefoneComercial(), 'cliente_edit', $cliente) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cidade">
  <?php echo link_to($cliente->getCidade(), 'cliente_edit', $cliente) ?>
</td>
