<?php use_helper('I18N', 'Date') ?>
<?php include_partial('estado/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Cadastrando Estado', array(), 'messages') ?></h1>

  <?php include_partial('estado/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('estado/form_header', array('estado' => $estado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('estado/form', array('estado' => $estado, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('estado/form_footer', array('estado' => $estado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
