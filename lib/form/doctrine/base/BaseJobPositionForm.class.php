<?php

/**
 * JobPosition form base class.
 *
 * @method JobPosition getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJobPositionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_position_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'job_position_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('job_position_id')), 'empty_value' => $this->getObject()->get('job_position_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('job_position[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobPosition';
  }

}
