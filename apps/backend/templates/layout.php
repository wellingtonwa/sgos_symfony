<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php use_helper('I18N') ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php use_javascript('jquery-1.4.2.min.js') ?>
    <?php use_javascript('jquery-ui-1.8.4.custom.min.js') ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_javascript('jquery-1.4.2.min.js'); ?>
    <?php use_stylesheet('resets.css') ?>
    <?php use_stylesheet('jquery-ui-1.8.2.custom.css') ?>
    <?php use_stylesheet('template.css') ?>
    <?php include_stylesheets() ?>
    
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="container">
    <div id="content">
        <div id="header">
            TOPO
            <div id="header_menu" class=""><br/><br/>
                <?php if ($sf_user->isAuthenticated()): ?>
                    <?php if($sf_user->hasCredential("admin")):?> 
                        <?php echo link_to('Usuarios Sistema', 'sf_guard_user') ?> |
                        <?php echo link_to('Permissões', 'sf_guard_permission') ?> |
                    <?php endif; ?>
                    <?php echo link_to('Pais', 'pais') ?> |
                    <?php echo link_to('Estados', 'estado') ?> |
                    <?php echo link_to('Cidades', 'cidade') ?> |
                    <?php echo link_to('Equipamento', 'equipamento') ?> |
                    <?php echo link_to('Tipo de Equipamento', 'tipo_equipamento') ?> |
                    <?php echo link_to('Clientes', 'cliente') ?> |
                    <?php echo link_to('Serviços', 'servico') ?> |
                    <?php echo link_to('Componentes', 'componente') ?> |
                    <?php echo link_to('Ordem Serviço', 'ordem_servico') ?> |
                    <?php echo link_to('Status', 'status') ?> |
                    <?php echo link_to('Sair', 'sf_guard_signout') ?>
                <?php endif; ?>
            </div>
        </div>
        <div id="centro">
            <?php echo $sf_content ?>
        </div>
        <br/><br/>
        <div id="footer">
           RODAPE
        </div>
    </div>

    </div>
  </body>
</html>
