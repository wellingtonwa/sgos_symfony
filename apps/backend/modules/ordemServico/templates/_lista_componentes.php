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

    <?php if($componentePager->getNbResults()>0): ?>
        <?php foreach ($componentePager->getResults() as $foreachComponente): ?>
            <tr>
                <td>
                    <?php echo $foreachComponente->getNome();?>
                </td>
                <td>
                    <?php echo $foreachComponente->getPreco();?>
                </td>
                <td width="15px">
                    <div class="ui-state-default ui-corner-all">
                        <div class="ui-icon ui-icon-circle-plus" title="Adicionar Componente a ordem de serviço" style="cursor: pointer" onclick="$('#componentesAdicionados').load('<?php echo url_for('ordemServico_adicionaComponente') ?>', {idComponente: <?php echo $foreachComponente->getId(); ?>})">
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        <?php if($componentePager->haveToPaginate()): ?>
            <tr>
                <td>
                    <div class="sf_admin_pagination">
                      <a href="javascript:pesquisaComponente(1);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/first.png', array('alt' => 'Primeira página', 'title' => 'Primeira página')) ?>
                      </a>

                      <a href="javascript:pesquisaComponente(<?php echo $componentePager->getPreviousPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/previous.png', array('alt' => 'Página anterior', 'title' => 'Página anterior')) ?>
                      </a>

                      <?php foreach ($componentePager->getLinks() as $page): ?>
                        <?php if ($page == $componentePager->getPage()): ?>
                          <?php echo $page ?>
                        <?php else: ?>
                          <a href="javascript:pesquisaComponente(<?php echo $page ?>);"><?php echo $page ?></a>
                        <?php endif; ?>
                      <?php endforeach; ?>

                      <a href="javascript:pesquisaComponente(<?php echo $componentePager->getNextPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/next.png', array('alt' => 'Próxima página', 'title' => 'Próxima página')) ?>
                      </a>

                      <a href="javascript:pesquisaComponente(<?php echo $componentePager->getLastPage() ?>);">
                        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/last.png', array('alt' => 'Última página', 'title' => 'Última página')) ?>
                      </a>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    <?php endif; ?>
</table>