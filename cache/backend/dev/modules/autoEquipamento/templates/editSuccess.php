<?php use_helper('I18N', 'Date') ?>
<?php include_partial('equipamento/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('editando - %%nome%%', array('%%nome%%' => $equipamento->getNome()), 'messages') ?></h1>

  <?php include_partial('equipamento/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('equipamento/form_header', array('equipamento' => $equipamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('equipamento/form', array('equipamento' => $equipamento, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('equipamento/form_footer', array('equipamento' => $equipamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
