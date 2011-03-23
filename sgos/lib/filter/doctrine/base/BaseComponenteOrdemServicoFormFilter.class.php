<?php

/**
 * ComponenteOrdemServico filter form base class.
 *
 * @package    sgos
 * @subpackage filter
 * @author     Wellington Wagner
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComponenteOrdemServicoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idOrdemServico' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdemServico'), 'add_empty' => true)),
      'idComponente'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'), 'add_empty' => true)),
      'quantidade'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'idOrdemServico' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdemServico'), 'column' => 'id')),
      'idComponente'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Componente'), 'column' => 'id')),
      'quantidade'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('componente_ordem_servico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComponenteOrdemServico';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'idOrdemServico' => 'ForeignKey',
      'idComponente'   => 'ForeignKey',
      'quantidade'     => 'Number',
    );
  }
}
