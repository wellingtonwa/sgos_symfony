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
    <?php use_stylesheet('jquery-ui-1.8.10.custom.css') ?>
    <?php use_stylesheet('template.css') ?>
    <?php include_stylesheets() ?>

    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="container">
    <div id="content">
        <div id="header">
            TOPO
            <div id="header_menu"><br/><br/>
                <a href="<?php echo url_for("solicitacao/new") ?>">Enviar Solicitação</a>
                |
                <a href="<?php echo $sf_context->getConfiguration()->generateFrontendUrl('ordem_servico') ?>">Área do Usuário</a>
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
