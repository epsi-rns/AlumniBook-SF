<?php

/**
 * JobTypeTranslation form base class.
 *
 * @method JobTypeTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJobTypeTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_type_id' => new sfWidgetFormInputHidden(),
      'job_type'    => new sfWidgetFormInputText(),
      'lang'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'job_type_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('job_type_id')), 'empty_value' => $this->getObject()->get('job_type_id'), 'required' => false)),
      'job_type'    => new sfValidatorString(array('max_length' => 50)),
      'lang'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'JobTypeTranslation', 'column' => array('job_type')))
    );

    $this->widgetSchema->setNameFormat('job_type_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobTypeTranslation';
  }

}
