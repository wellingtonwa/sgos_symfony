<?php

/**
 * cidade module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage cidade
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCidadeGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'cidade_cidade' : 'cidade_cidade_'.$action;
  }
}
