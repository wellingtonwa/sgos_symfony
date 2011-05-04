<?php if($sf_user->hasCredential('funcionario')): ?>
    <?php echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>
<?php endif; ?> 