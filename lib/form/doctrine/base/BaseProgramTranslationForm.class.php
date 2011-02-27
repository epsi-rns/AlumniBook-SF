<?php

/**
 * ProgramTranslation form base class.
 *
 * @method ProgramTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProgramTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'program_id' => new sfWidgetFormInputHidden(),
      'program'    => new sfWidgetFormInputText(),
      'lang'       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'program_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('program_id')), 'empty_value' => $this->getObject()->get('program_id'), 'required' => false)),
      'program'    => new sfValidatorString(array('max_length' => 20)),
      'lang'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProgramTranslation', 'column' => array('program')))
    );

    $this->widgetSchema->setNameFormat('program_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProgramTranslation';
  }

}
