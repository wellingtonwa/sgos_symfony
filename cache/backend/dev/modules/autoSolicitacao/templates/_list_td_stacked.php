<td colspan="4">
  <?php echo __('%%nome%% - %%telefone1%% - %%telefone2%% - %%descricao_problema%%', array('%%nome%%' => link_to($solicitacao->getNome(), 'solicitacao_edit', $solicitacao), '%%telefone1%%' => link_to($solicitacao->getTelefone1(), 'solicitacao_edit', $solicitacao), '%%telefone2%%' => link_to($solicitacao->getTelefone2(), 'solicitacao_edit', $solicitacao), '%%descricao_problema%%' => link_to($solicitacao->getDescricaoProblema(), 'solicitacao_edit', $solicitacao)), 'messages') ?>
</td>
