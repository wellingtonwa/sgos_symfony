<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Salvar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToList(array(  'label' => 'Voltar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
<?php else: ?>
  <?php if($sf_user->hasCredential('funcionario') || $sf_user->hasCredential('admin')): ?>
    <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Alterar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php endif; ?>
  <?php echo $helper->linkToList(array(  'label' => 'Voltar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php if($sf_user->hasCredential('funcionario') || $sf_user->hasCredential('admin')): ?>
      <?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Excluir',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
      <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Alterar e Adicionar',  'params' =>   array(  ),  'class_suffix' => 'save',)); ?>
  <?php endif; ?>
<?php endif; ?>
</ul>
