<?php

/**
 * AExperiences form base class.
 *
 * @method AExperiences getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAExperiencesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'          => new sfWidgetFormInputHidden(),
      'aid'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => false)),
      'organization' => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'job_position' => new sfWidgetFormInputText(),
      'year_in'      => new sfWidgetFormInputText(),
      'year_out'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'aid'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'))),
      'organization' => new sfValidatorString(array('max_length' => 35)),
      'description'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'job_position' => new sfValidatorString(array('max_length' => 35, 'required' => false)),
      'year_in'      => new sfValidatorInteger(array('required' => false)),
      'year_out'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_experiences[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AExperiences';
  }

}
