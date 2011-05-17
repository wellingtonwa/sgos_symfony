<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php use_helper('I18N') ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php use_javascript('jquery-1.4.2.min.js') ?>
    <?php use_javascript('jquery-ui-1.8.4.custom.min.js') ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_javascript('jquery-1.4.2.min.js'); ?>
    <?php use_stylesheet('resets.css') ?>
    <?php use_stylesheet('jquery-ui-1.8.10.custom.css') ?>
    <?php use_stylesheet('template.css') ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php if(has_slot('title')): ?>
        <title><?php include_slot('title') ?></title>
    <?php else: ?>
        <title>Sistema de Gestão de Ordem de Serviço</title>
    <?php endif; ?>
  </head>
  <body>
    <div id="container">
    <div id="content">
        <div id="header">
            <div class="logo"></div>
        </div>
        <?php if ($sf_user->isAuthenticated()): ?>
            <ul class="menu">
                

                <?php if($sf_user->hasCredential("admin")):?>

                    <div class="menu_ls"></div>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Usuarios Sistema', 'sf_guard_user') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Permissões', 'sf_guard_permission') ?></li>

                <?php endif; ?>
                <?php if ($sf_user->hasCredential('funcionario')): ?>

                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Pais', 'pais') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Estados', 'estado') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Cidades', 'cidade') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Equipamento', 'equipamento') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Tipo de Equipamento', 'tipo_equipamento') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Clientes', 'cliente') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Serviços', 'servico') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Componentes', 'componente') ?></li>
                    <li class="ui-state-default ui-corner-all"><?php echo link_to('Solicitações', 'solicitacao') ?></li>

                <?php endif; ?>

                <li class="ui-state-default ui-corner-all"><?php echo link_to('Ordem Serviço', 'ordem_servico') ?></li>
                <li class="ui-state-default ui-corner-all"><?php echo link_to('Sair', 'sf_guard_signout') ?></li>
            </ul>
        <?php endif; ?>
        
        <div style="overflow: hidden; width: 80%" class="ui-corner-all">
            <div id="centro">
                <div id="conteudo">
                    <?php echo $sf_content ?>
                </div>
            </div>
        </div>
        <div class="clear1"></div>
        <br/><br/>
        <div id="footer">
           RODAPE
        </div>
    </div>

    </div>
  </body>
</html>
