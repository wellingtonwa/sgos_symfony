<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($sf_guard_user, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToShow($sf_guard_user, array(  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Visualizar',)) ?>
    <?php echo $helper->linkToDelete($sf_guard_user, array(  'params' =>   array(  ),  'confirm' => 'Deseja realmente excluir o registro?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
