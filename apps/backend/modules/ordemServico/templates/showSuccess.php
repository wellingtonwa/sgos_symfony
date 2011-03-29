<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ordem_servico->getId() ?></td>
    </tr>
    <tr>
      <th>Id cliente:</th>
      <td><?php echo $ordem_servico->getIdCliente() ?></td>
    </tr>
    <tr>
      <th>Id equipamento:</th>
      <td><?php echo $ordem_servico->getIdEquipamento() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $ordem_servico->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $ordem_servico->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('ordemServico/edit?id='.$ordem_servico->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('ordemServico/index') ?>">List</a>
