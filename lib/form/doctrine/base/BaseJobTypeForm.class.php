<?php

/**
 * JobType form base class.
 *
 * @method JobType getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJobTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_type_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'job_type_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('job_type_id')), 'empty_value' => $this->getObject()->get('job_type_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('job_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobType';
  }

}
