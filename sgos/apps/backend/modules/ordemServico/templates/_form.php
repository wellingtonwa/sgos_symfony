<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@ordem_servico') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    
    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('ordemServico/form_fieldset', array('ordem_servico' => $ordem_servico, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset, 'dadosForm'=>$dadosForm, )) ?>
    <?php endforeach; ?>

    <?php include_partial('ordemServico/form_actions', array('ordem_servico' => $ordem_servico, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
