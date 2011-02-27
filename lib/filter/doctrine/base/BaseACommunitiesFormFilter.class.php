<?php

/**
 * ACommunities filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseACommunitiesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'cid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Community'), 'add_empty' => true)),
      'class_year'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'class_sub'     => new sfWidgetFormFilterInput(),
      'community'     => new sfWidgetFormFilterInput(),
      'department_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => true)),
      'program_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'aid'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'cid'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Community'), 'column' => 'cid')),
      'class_year'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'class_sub'     => new sfValidatorPass(array('required' => false)),
      'community'     => new sfValidatorPass(array('required' => false)),
      'department_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'department_id')),
      'faculty_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Faculty'), 'column' => 'faculty_id')),
      'program_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Program'), 'column' => 'program_id')),
    ));

    $this->widgetSchema->setNameFormat('a_communities_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ACommunities';
  }

  public function getFields()
  {
    return array(
      'did'           => 'Number',
      'aid'           => 'ForeignKey',
      'cid'           => 'ForeignKey',
      'class_year'    => 'Number',
      'class_sub'     => 'Text',
      'community'     => 'Text',
      'department_id' => 'ForeignKey',
      'faculty_id'    => 'ForeignKey',
      'program_id'    => 'ForeignKey',
    );
  }
}
