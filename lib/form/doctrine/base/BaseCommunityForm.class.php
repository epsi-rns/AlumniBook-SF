<?php

/**
 * Community form base class.
 *
 * @method Community getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommunityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cid'           => new sfWidgetFormInputHidden(),
      'community'     => new sfWidgetFormInputText(),
      'brief'         => new sfWidgetFormInputText(),
      'department_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => false)),
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => false)),
      'program_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Program'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'cid'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cid')), 'empty_value' => $this->getObject()->get('cid'), 'required' => false)),
      'community'     => new sfValidatorString(array('max_length' => 50)),
      'brief'         => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'department_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'))),
      'faculty_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'))),
      'program_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Program'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Community', 'column' => array('community'))),
        new sfValidatorDoctrineUnique(array('model' => 'Community', 'column' => array('brief'))),
      ))
    );

    $this->widgetSchema->setNameFormat('community[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community';
  }

}
