<td>
  <ul class="sf_admin_td_actions">
    <?php if($sf_user->hasCredential('funcionario')): ?>
        <?php echo $helper->linkToEdit($ordem_servico, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
      <?php echo $helper->linkToDelete($ordem_servico, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php else : ?>
      <li class="sf_admin_action_show"><a href ="<?php echo url_for("ordemServico/show?id=".$ordem_servico->getId())?>">Visualizar</a></li>
    <?php endif ?>    
  </ul>
</td>
