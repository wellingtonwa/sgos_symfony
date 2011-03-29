<h1>Observacao ordem servicos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id usuario</th>
      <th>Observacao</th>
      <th>Id ordem servico</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($observacao_ordem_servicos as $observacao_ordem_servico): ?>
    <tr>
      <td><a href="<?php echo url_for('observacaoOrdemServico/edit?id='.$observacao_ordem_servico->getId()) ?>"><?php echo $observacao_ordem_servico->getId() ?></a></td>
      <td><?php echo $observacao_ordem_servico->getIdUsuario() ?></td>
      <td><?php echo $observacao_ordem_servico->getObservacao() ?></td>
      <td><?php echo $observacao_ordem_servico->getIdOrdemServico() ?></td>
      <td><?php echo $observacao_ordem_servico->getStatus() ?></td>
      <td><?php echo $observacao_ordem_servico->getCreatedAt() ?></td>
      <td><?php echo $observacao_ordem_servico->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('observacaoOrdemServico/new') ?>">New</a>
