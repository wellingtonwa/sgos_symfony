<script>
    $(document).ready(function(){
        $('#queryServico').keypress(function(e) {
            if(e.keyCode==13){
                e.preventDefault();
                pesquisaServico();
            }
        });
        $('#queryComponente').keypress(function(e) {
            if(e.keyCode==13){
                e.preventDefault();
                pesquisaComponente();
            }
        });
        $('#equipamentosCliente').load('changeCliente', {idCliente: $('#idCliente').val()});
    });

    $('#formOrdemServico').submit(function() {
        $.each(this.elements, function(key, element){
            if(element.type == 'submit'){
                element.disabled = true;
            }
        });
        return true;
    });

    function pesquisaServico(pagina){
        $('#listaDeServicos').load('<?php echo url_for('ordemServico_pesquisaServico'); ?>', {query: $('#queryServico').val(), page:pagina});
    }

    function pesquisaComponente(pagina){
        $('#listaDeComponentes').load('<?php echo url_for('ordemServico_pesquisaComponente'); ?>', {query: $('#queryComponente').val(), page:pagina});
    }

</script>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="idCliente">Cliente</label>
    <div class="content">
        <select name="ordem_servico[idCliente]" id="idCliente" onchange="$('#equipamentosCliente').load('changeCliente', {idCliente: this.value});">
            <?php foreach ($clientes as $foreachCliente): ?>
                <option value="<?php echo $foreachCliente->getId() ?>"><?php echo $foreachCliente; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="equipamentos">Equipamentos</label>
    <div id="equipamentosCliente">
        <?php include_partial('equipamentos_cliente', array('dadosEquipamentos'=>$dadosEquipamentos, 'ordem_servico'=>$ordem_servico)) ?>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="status">Status</label>
    <?php echo $form->getWidget('status')->render('ordem_servico[status]', $ordem_servico->getStatus()); ?>
    <div style="clear: both;"></div>
</div>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="servicos">Serviços</label><br/><br/>
    <div id="servicosOS">
        <div class="pesquisa">
            <!-- PESQUISA DE SERVIÇOS -->
            <label for="nomeServico">Pesquisar nome:</label>
            <div class="content">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="queryServico" id="queryServico" size="20">
                        </td>
                        <td>
                            <div class="ui-state-default ui-corner-all" onclick="pesquisaServico()">
                                <span class="ui-icon ui-icon-search"/>
                            </div>
                        </td>
                </table>
            </div>
        </div>


        <!-- Lista de Serviços disponíveis-->
        <div style="width: 50%; float: left;">
            <div id="listaDeServicos" style=" min-width: 150px; margin-right: 10px;">
                <?php include_partial('lista_servicos', array('dadosServicos'=>$dadosServicos, 'servicoPager'=>$servicoPager)); ?>
            </div>
        </div>

        <!-- Serviços adicionados -->
        <div style="width: 50%; float: right; clear: right;">
            <div id="servicosAdicionados" style="min-height: 150px; min-width:150px;">
                <?php include_partial('servicos_ordem_servico', array('dadosServicosAdicionados'=>$dadosServicosAdicionados)); ?>
            </div>
        </div>


        <?php // include_partial('servicos_ordem_servico', array('dadosServicos'=>$dadosServicos)) ?>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    <label for="servicos">Componentes</label><br/><br/>
    <div id="ComponentesOS">
        <label for="nomeServico" style="left: 20%;">Pesquisar nome:</label>
        <div class="pesquisa">
            <!-- PESQUISA DE COMPONENTES -->
            <table>
                <tr>
                    <td>
                        <input type="text" name="queryComponente" id="queryComponente" size="20">
                    </td>
                    <td>
                        <div class="ui-state-default ui-corner-all" onclick="pesquisaComponente()">
                            <span class="ui-icon ui-icon-search"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Lista de Componentes Disponíveis -->
        <div style="width: 50%; float: left;">
            <div id="listaDeComponentes" style="min-height: 150px; min-width: 150px;  margin-right: 10px;">
                <?php include_partial('lista_componentes', array('dadosComponentes'=>$dadosComponentes, 'componentePager'=>$componentePager)); ?>
            </div>
        </div>
        <!-- Lista de Componentes adicionados à OS -->
        <div style="width: 50%; float: right; clear: right;">
            <div id="componentesAdicionados" style="min-height: 150px; min-width: 150px;">
                <?php include_partial('componentes_ordem_servico', array('dadosComponentesAdicionados'=>$dadosComponentesAdicionados)); ?>
            </div>
        </div>
    </div>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
    </div>
    <div style="clear: both;"></div>

    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field">
        <label for="descricao">Descrição do Problema</label>
            <?php echo $form->getWidget('descricao_problema')->render('ordem_servico[descricao_problema]', $ordem_servico->getDescricaoProblema()); ?>
        <div style="clear: both;"></div>
    </div>

    <?php include_partial('form_observacao', array('formObservacao'=>$formObservacao, 'ordem_servico'=>$ordem_servico)) ?>

</div>



