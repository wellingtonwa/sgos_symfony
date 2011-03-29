<h1>Usuarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Login</th>
      <th>Senha</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/show?id='.$usuario->getId()) ?>"><?php echo $usuario->getId() ?></a></td>
      <td><?php echo $usuario->getNome() ?></td>
      <td><?php echo $usuario->getEmail() ?></td>
      <td><?php echo $usuario->getLogin() ?></td>
      <td><?php echo $usuario->getSenha() ?></td>
      <td><?php echo $usuario->getCreatedAt() ?></td>
      <td><?php echo $usuario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">New</a>
