<td>
  <ul class="sf_admin_td_actions">
    <?php if($sf_user->hasCredential('funcionario')): ?>
        <?php echo $helper->linkToEdit($ordem_servico, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
        <?php echo $helper->linkToShow($ordem_servico, array(  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Visualizar',)) ?>
        <?php echo $helper->linkToDelete($ordem_servico, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php else : ?>
      <?php echo $helper->linkToShow($ordem_servico, array(  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Visualizar',)) ?>
    <?php endif ?>    
  </ul>
</td>
