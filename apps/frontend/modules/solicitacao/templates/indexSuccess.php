<h1>Solicitacaos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone1</th>
      <th>Telefone2</th>
      <th>Descricao problema</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($solicitacaos as $solicitacao): ?>
    <tr>
      <td><a href="<?php echo url_for('solicitacao/show?id='.$solicitacao->getId()) ?>"><?php echo $solicitacao->getId() ?></a></td>
      <td><?php echo $solicitacao->getNome() ?></td>
      <td><?php echo $solicitacao->getEmail() ?></td>
      <td><?php echo $solicitacao->getTelefone1() ?></td>
      <td><?php echo $solicitacao->getTelefone2() ?></td>
      <td><?php echo $solicitacao->getDescricaoProblema() ?></td>
      <td><?php echo $solicitacao->getCreatedAt() ?></td>
      <td><?php echo $solicitacao->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('solicitacao/new') ?>">New</a>
