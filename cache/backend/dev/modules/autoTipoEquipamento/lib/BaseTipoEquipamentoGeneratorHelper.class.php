<?php

/**
 * tipoEquipamento module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage tipoEquipamento
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTipoEquipamentoGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'tipo_equipamento' : 'tipo_equipamento_'.$action;
  }
}
