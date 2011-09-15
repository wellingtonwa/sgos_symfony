<?php

/**
 * OrdemServico filter form.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdemServicoFormFilter extends BaseOrdemServicoFormFilter
{
  public function configure()
  {
      
      $this->getWidget('created_at')->setOption('template', 'de %from_date% <br>até %to_date%');

  }
}
