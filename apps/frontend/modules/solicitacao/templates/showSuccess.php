<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $solicitacao->getId() ?></td>
    </tr>
    <tr>
      <th>Nome:</th>
      <td><?php echo $solicitacao->getNome() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $solicitacao->getEmail() ?></td>
    </tr>
    <tr>
      <th>Telefone1:</th>
      <td><?php echo $solicitacao->getTelefone1() ?></td>
    </tr>
    <tr>
      <th>Telefone2:</th>
      <td><?php echo $solicitacao->getTelefone2() ?></td>
    </tr>
    <tr>
      <th>Descricao problema:</th>
      <td><?php echo $solicitacao->getDescricaoProblema() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $solicitacao->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $solicitacao->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('solicitacao/edit?id='.$solicitacao->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('solicitacao/index') ?>">List</a>
