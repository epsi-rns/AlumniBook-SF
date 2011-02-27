<?php

/**
 * Community filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommunityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'community'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brief'         => new sfWidgetFormFilterInput(),
      'department_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => true)),
      'program_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'community'     => new sfValidatorPass(array('required' => false)),
      'brief'         => new sfValidatorPass(array('required' => false)),
      'department_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'department_id')),
      'faculty_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Faculty'), 'column' => 'faculty_id')),
      'program_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Program'), 'column' => 'program_id')),
    ));

    $this->widgetSchema->setNameFormat('community_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community';
  }

  public function getFields()
  {
    return array(
      'cid'           => 'Number',
      'community'     => 'Text',
      'brief'         => 'Text',
      'department_id' => 'ForeignKey',
      'faculty_id'    => 'ForeignKey',
      'program_id'    => 'ForeignKey',
    );
  }
}
