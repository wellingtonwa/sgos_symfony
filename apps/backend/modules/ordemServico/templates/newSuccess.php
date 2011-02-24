<?php use_helper('I18N', 'Date') ?>
<?php include_partial('ordemServico/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nova Ordem de Serviço', array(), 'messages') ?></h1>

  <?php include_partial('ordemServico/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('ordemServico/form_header', array('ordem_servico' => $ordem_servico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('ordemServico/form', array('ordem_servico' => $ordem_servico, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'dadosForm'=>$dadosForm)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('ordemServico/form_footer', array('ordem_servico' => $ordem_servico, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
