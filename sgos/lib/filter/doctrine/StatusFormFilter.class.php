<?php

/**
 * Status filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StatusFormFilter extends BaseStatusFormFilter
{
  public function configure()
  {
      $this->getWidget('created_at')->setOption('template', 'de %from_date%<br />até %to_date%');
      $this->getWidget('significado')->setOption('empty_label', 'vazio');
  }
}
