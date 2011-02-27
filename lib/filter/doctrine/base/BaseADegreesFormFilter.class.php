<?php

/**
 * ADegrees filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseADegreesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'strata_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Strata'), 'add_empty' => true)),
      'admitted'      => new sfWidgetFormFilterInput(),
      'graduated'     => new sfWidgetFormFilterInput(),
      'degree'        => new sfWidgetFormFilterInput(),
      'institution'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'major'         => new sfWidgetFormFilterInput(),
      'minor'         => new sfWidgetFormFilterInput(),
      'concentration' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'aid'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'strata_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Strata'), 'column' => 'strata_id')),
      'admitted'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'graduated'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'degree'        => new sfValidatorPass(array('required' => false)),
      'institution'   => new sfValidatorPass(array('required' => false)),
      'major'         => new sfValidatorPass(array('required' => false)),
      'minor'         => new sfValidatorPass(array('required' => false)),
      'concentration' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_degrees_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ADegrees';
  }

  public function getFields()
  {
    return array(
      'did'           => 'Number',
      'aid'           => 'ForeignKey',
      'strata_id'     => 'ForeignKey',
      'admitted'      => 'Number',
      'graduated'     => 'Number',
      'degree'        => 'Text',
      'institution'   => 'Text',
      'major'         => 'Text',
      'minor'         => 'Text',
      'concentration' => 'Text',
    );
  }
}
