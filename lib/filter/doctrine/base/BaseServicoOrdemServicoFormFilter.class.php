<?php

/**
 * ServicoOrdemServico filter form base class.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServicoOrdemServicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => true)),
      'idServico'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Servico'), 'add_empty' => true)),
      'quantidade'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdemServico'), 'column' => 'id')),
      'idServico'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Servico'), 'column' => 'id')),
      'quantidade'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('servico_ordem_servico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicoOrdemServico';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'idOrdemServico' => 'ForeignKey',
      'idServico'      => 'ForeignKey',
      'quantidade'     => 'Number',
    );
  }
}
