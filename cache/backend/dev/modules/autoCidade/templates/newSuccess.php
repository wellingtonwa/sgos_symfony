<?php use_helper('I18N', 'Date') ?>
<?php include_partial('cidade/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nova Cidade', array(), 'messages') ?></h1>

  <?php include_partial('cidade/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('cidade/form_header', array('cidade' => $cidade, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('cidade/form', array('cidade' => $cidade, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('cidade/form_footer', array('cidade' => $cidade, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
