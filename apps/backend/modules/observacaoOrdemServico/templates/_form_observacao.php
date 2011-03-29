<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('observacaoOrdemServico/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('observacaoOrdemServico/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'observacaoOrdemServico/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="<?php echo __('Save', 'sf_admin') ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['idUsuario']->renderLabel() ?></th>
        <td>
          <?php echo $form['idUsuario']->renderError() ?>
          <?php echo $form['idUsuario'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['observacao']->renderLabel() ?></th>
        <td>
          <?php echo $form['observacao']->renderError() ?>
          <?php echo $form['observacao'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
