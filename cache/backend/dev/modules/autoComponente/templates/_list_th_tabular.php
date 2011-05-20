<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nome">
  <?php if ('nome' == $sort[0]): ?>
    <?php echo link_to(__('Nome', array(), 'messages'), '@componente', array('query_string' => 'sort=nome&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nome', array(), 'messages'), '@componente', array('query_string' => 'sort=nome&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_descricao">
  <?php if ('descricao' == $sort[0]): ?>
    <?php echo link_to(__('Descricao', array(), 'messages'), '@componente', array('query_string' => 'sort=descricao&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Descricao', array(), 'messages'), '@componente', array('query_string' => 'sort=descricao&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_preco">
  <?php if ('preco' == $sort[0]): ?>
    <?php echo link_to(__('Preco', array(), 'messages'), '@componente', array('query_string' => 'sort=preco&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Preco', array(), 'messages'), '@componente', array('query_string' => 'sort=preco&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>