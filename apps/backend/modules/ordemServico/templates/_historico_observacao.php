
<?php if($observacoesOrdemServico->count()>0): ?>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
        <div id="accordion" class="ui-accordion ui-widget ui-helper-reset ui-accordion-icons" role="tablist">
            <?php foreach($observacoesOrdemServico as $index=>$observacao): ?>
                <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-state-active ui-corner-top" role="tab">
                    <span class="ui-icon ui-icon-triangle-1-e"></span>
                    <a href="javascript: void(0);" tabindex="<?php echo $index; ?>">
                        <?php echo $observacao->getSfGuardUser()->getFirstName()." - ".$observacao->getStatus()." - ".$observacao->getDateTimeObject('created_at')->format('d/m/Y H:i:s');  ?>
                    </a>
                </h3>
                <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
                    <?php echo $observacao->getRaw('observacao'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>