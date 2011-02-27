<?php

/**
 * AExperiences filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAExperiencesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'organization' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(),
      'job_position' => new sfWidgetFormFilterInput(),
      'year_in'      => new sfWidgetFormFilterInput(),
      'year_out'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'aid'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'organization' => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'job_position' => new sfValidatorPass(array('required' => false)),
      'year_in'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year_out'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('a_experiences_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AExperiences';
  }

  public function getFields()
  {
    return array(
      'did'          => 'Number',
      'aid'          => 'ForeignKey',
      'organization' => 'Text',
      'description'  => 'Text',
      'job_position' => 'Text',
      'year_in'      => 'Number',
      'year_out'     => 'Number',
    );
  }
}
