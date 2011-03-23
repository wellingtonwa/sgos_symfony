<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $usuario->getId() ?></td>
    </tr>
    <tr>
      <th>Nome:</th>
      <td><?php echo $usuario->getNome() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $usuario->getEmail() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $usuario->getLogin() ?></td>
    </tr>
    <tr>
      <th>Senha:</th>
      <td><?php echo $usuario->getSenha() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $usuario->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $usuario->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('usuario/edit?id='.$usuario->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('usuario/index') ?>">List</a>
