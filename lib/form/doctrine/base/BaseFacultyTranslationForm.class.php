<?php

/**
 * FacultyTranslation form base class.
 *
 * @method FacultyTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFacultyTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faculty_id' => new sfWidgetFormInputHidden(),
      'faculty'    => new sfWidgetFormInputText(),
      'lang'       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'faculty_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faculty_id')), 'empty_value' => $this->getObject()->get('faculty_id'), 'required' => false)),
      'faculty'    => new sfValidatorString(array('max_length' => 35)),
      'lang'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'FacultyTranslation', 'column' => array('faculty')))
    );

    $this->widgetSchema->setNameFormat('faculty_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacultyTranslation';
  }

}
