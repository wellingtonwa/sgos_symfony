<?php

/**
 * sfGuardUser filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
      $this->setWidget('last_name', new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
      $this->setWidget('first_name', new sfWidgetFormFilterInput(array('empty_label'=>'vazio')));
  }
}
