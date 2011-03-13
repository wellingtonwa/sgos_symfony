<?php use_helper('I18N', 'Date') ?>
<?php include_partial('solicitacao/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Solicitacao', array(), 'messages') ?></h1>

  <?php include_partial('solicitacao/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('solicitacao/form_header', array('solicitacao' => $solicitacao, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('solicitacao/form', array('solicitacao' => $solicitacao, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('solicitacao/form_footer', array('solicitacao' => $solicitacao, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
