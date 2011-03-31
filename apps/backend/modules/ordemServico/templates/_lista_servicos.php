<table width="100%">
    <tr>
        <td colspan="3" style="background: #8f8f8f">
            Componentes Disponíveis
        </td>
    </tr>
    <tr style="background: #afafaf">
        <td>
            Nome
        </td>
        <td colspan="2">
            Preço
        </td>
    </tr>

        <?php if($servicoPager->getNbResults()>0): ?>
            <?php foreach ($servicoPager as $i=>$foreachServico): ?>
                <tr>
                    <td>
                        <?php echo $foreachServico->getNome();?>
                    </td>
                    <td>
                        <?php echo $foreachServico->getPreco();?>
                    </td>
                    <td width="15px;">
                    <div class="ui-state-default ui-corner-all">
                        <div class="ui-icon ui-icon-circle-plus" title="Adicionar Componente a ordem de serviço" style="cursor: pointer" onclick="$('#servicosAdicionados').load('<?php echo url_for('ordemServico_adicionaServico') ?>', {idServico: <?php echo $foreachServico->getId(); ?>})">
                        </div>
                    </div>                   
                </td>
            </tr>
        <?php endforeach;?>
    <?php else: ?>
           <tr>
               <td colspan="3">
                   <i>Nenhum serviços encontrado.</i>
               </td>
            </tr>
    <?php endif; ?>
    <!-- Paginação -->
    <?php if($servicoPager->haveToPaginate()): ?>
        <tr>
            <td colspan="3" align="center">

                    <div class="sf_admin_pagination">
                      <a href="javascript:pesquisaServico(1);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/first.png', array('alt' => 'Primeira página', 'title' => 'Primeira página')) ?>
                      </a>

                      <a href="javascript:pesquisaServico(<?php echo $servicoPager->getPreviousPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/previous.png', array('alt' => 'Página anterior', 'title' => 'Página anterior')) ?>
                      </a>

                      <?php foreach ($servicoPager->getLinks() as $page): ?>
                        <?php if ($page == $servicoPager->getPage()): ?>
                          <?php echo $page ?>
                        <?php else: ?>
                          <a href="javascript:pesquisaServico(<?php echo $page ?>);"><?php echo $page ?></a>
                        <?php endif; ?>
                      <?php endforeach; ?>

                      <a href="javascript:pesquisaServico(<?php echo $servicoPager->getNextPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/next.png', array('alt' => 'Próxima página', 'title' => 'Próxima página')) ?>
                      </a>

                      <a href="javascript:pesquisaServico(<?php echo $servicoPager->getLastPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/last.png', array('alt' => 'Última página', 'title' => 'Última página')) ?>
                      </a>
                    </div>

            </td>
        </tr>
    <?php endif; ?>
</table>
