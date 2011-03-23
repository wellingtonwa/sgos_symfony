<td class="sf_admin_text sf_admin_list_td_nome">
  <?php echo link_to($solicitacao->getNome(), 'solicitacao_show', $solicitacao) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefone1">
  <?php echo link_to($solicitacao->getTelefone1(), 'solicitacao_show', $solicitacao) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefone2">
  <?php echo link_to($solicitacao->getTelefone2(), 'solicitacao_show', $solicitacao) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_descricao_problema">
  <?php echo link_to($solicitacao->getDescricaoProblema(), 'solicitacao_show', $solicitacao) ?>
</td>
