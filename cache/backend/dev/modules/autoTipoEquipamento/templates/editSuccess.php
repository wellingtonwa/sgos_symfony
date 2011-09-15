<?php use_helper('I18N', 'Date') ?>
<?php include_partial('tipoEquipamento/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editando %%nome%%', array('%%nome%%' => $tipo_equipamento->getNome()), 'messages') ?></h1>

  <?php include_partial('tipoEquipamento/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('tipoEquipamento/form_header', array('tipo_equipamento' => $tipo_equipamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('tipoEquipamento/form', array('tipo_equipamento' => $tipo_equipamento, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('tipoEquipamento/form_footer', array('tipo_equipamento' => $tipo_equipamento, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
