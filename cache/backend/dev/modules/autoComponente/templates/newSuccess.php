<?php use_helper('I18N', 'Date') ?>
<?php include_partial('componente/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Novo Componente', array(), 'messages') ?></h1>

  <?php include_partial('componente/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('componente/form_header', array('componente' => $componente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('componente/form', array('componente' => $componente, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('componente/form_footer', array('componente' => $componente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
