<?php use_helper('I18N', 'Date') ?>
<?php include_partial('servico/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editando - %%nome%%', array('%%nome%%' => $servico->getNome()), 'messages') ?></h1>

  <?php include_partial('servico/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('servico/form_header', array('servico' => $servico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('servico/form', array('servico' => $servico, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('servico/form_footer', array('servico' => $servico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
