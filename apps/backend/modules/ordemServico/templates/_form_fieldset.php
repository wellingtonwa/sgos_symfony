<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>
  
  <?php include_partial('form_field', array('clientes'=>$dadosForm['clientes']
                                            , 'dadosEquipamentos'=>$dadosForm['dadosEquipamentos']
                                            , 'dadosServicos'=>$dadosForm['dadosServicos']
                                            , 'servicoPager'=>$dadosForm['servicoPager']
                                            , 'dadosComponentes'=>$dadosForm['dadosComponentes']
                                            , 'componentePager'=>$dadosForm['componentePager']
                                            , 'dadosServicosAdicionados'=>$dadosForm['dadosServicosAdicionados']
                                            , 'dadosComponentesAdicionados'=>$dadosForm['dadosComponentesAdicionados']
                                            , 'form'=>$form
                                            , 'ordem_servico'=>$ordem_servico
                                            , 'formObservacao'=>$formObservacao
                                            , 'observacoesOrdemServico'=>$dadosForm['observacoesOrdemServico'])) ?>
</fieldset>
