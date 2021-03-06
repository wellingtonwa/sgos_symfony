<?php use_helper('I18N', 'Date') ?>
<?php include_partial('status/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Novo status', array(), 'messages') ?></h1>

  <?php include_partial('status/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('status/form_header', array('Status' => $Status, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('status/form', array('Status' => $Status, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('status/form_footer', array('Status' => $Status, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
