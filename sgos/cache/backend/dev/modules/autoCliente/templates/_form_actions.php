<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Salvar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToList(array(  'label' => 'Voltar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
<?php else: ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Salvar',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToList(array(  'label' => 'Voltar',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Excluir',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
<?php endif; ?>
</ul>
