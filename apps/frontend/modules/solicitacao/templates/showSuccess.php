<?php if($sf_user->hasFlash('notice')): ?>
    <div style="margin-top: 20px; margin-bottom: 20px; padding: 0pt 0.7em;" class="ui-state-highlight ui-corner-all">
        <p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-info"></span>
        <?php echo $sf_user->getFlash('notice') ?></p>
    </div>
<?php endif; ?>
<table>
  <tbody>
    <tr>
      <th>Nome: </th>
      <td><?php echo $solicitacao->getNome() ?></td>
    </tr>
    <tr>
      <th>Email: </th>
      <td><?php echo $solicitacao->getEmail() ?></td>
    </tr>
    <tr>
      <th>Telefone1: </th>
      <td><?php echo $solicitacao->getTelefone1() ?></td>
    </tr>
    <tr>
      <th>Telefone2: </th>
      <td><?php echo $solicitacao->getTelefone2() ?></td>
    </tr>
    <tr>
      <th>
        Descricao problema: <br/>
       
      </th>
      <td>
           <?php echo $solicitacao->getDescricaoProblema() ?>
      </td>
    </tr>
    <tr>
      <th>Enviada em: </th>
      <td><?php echo $solicitacao->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />
<a href="<?php echo url_for('') ?>">Voltar para página inicial</a>
