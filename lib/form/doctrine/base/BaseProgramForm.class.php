<?php

/**
 * Program form base class.
 *
 * @method Program getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProgramForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'program_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'program_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('program_id')), 'empty_value' => $this->getObject()->get('program_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('program[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Program';
  }

}
