<strong>Nome do solicitante: </strong><?php echo $solicitacao->getNome() ?><br/><br/>
<strong>Telefone(s) do solicitante: </strong><?php echo $solicitacao->getTelefone1(); ?> | <?php echo $solicitacao->getTelefone2() ?><br/><br/>
<strong>E-mail: </strong><?php echo $solicitacao->getEmail() ?><br/><br/>
<strong>Descrição do problema: </strong><?php echo $solicitacao->getDescricaoProblema(); ?>
<br/><br/>
<?php include_partial('show_actions', array('solicitacao'=>$solicitacao)); ?>
