<?php

/**
 * ACommunities form base class.
 *
 * @method ACommunities getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseACommunitiesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'           => new sfWidgetFormInputHidden(),
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => false)),
      'cid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Community'), 'add_empty' => false)),
      'class_year'    => new sfWidgetFormInputText(),
      'class_sub'     => new sfWidgetFormInputText(),
      'community'     => new sfWidgetFormInputText(),
      'department_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => true)),
      'program_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'did'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'aid'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'))),
      'cid'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Community'))),
      'class_year'    => new sfValidatorInteger(),
      'class_sub'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'community'     => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'department_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'faculty_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'required' => false)),
      'program_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_communities[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ACommunities';
  }

}
