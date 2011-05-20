<?php use_helper('I18N', 'Date') ?>
<?php include_partial('pais/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editando %%nome%%', array('%%nome%%' => $pais->getNome()), 'messages') ?></h1>

  <?php include_partial('pais/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('pais/form_header', array('pais' => $pais, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('pais/form', array('pais' => $pais, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('pais/form_footer', array('pais' => $pais, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
