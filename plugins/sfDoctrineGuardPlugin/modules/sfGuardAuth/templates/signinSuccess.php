<?php use_helper('I18N') ?>

<div style="overflow: hidden; width: 350px; margin: auto;" class="ui-corner-all">
    <div id="centro" style="width: 350px;">
        <div class="form-solicitacao">
            <h1><?php echo __('Signin Form', null, 'sf_guard') ?></h1>

            <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
        </div>
    </div>
</div>