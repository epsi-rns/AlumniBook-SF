<?php

/**
 * Faculty form base class.
 *
 * @method Faculty getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFacultyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faculty_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'faculty_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faculty_id')), 'empty_value' => $this->getObject()->get('faculty_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faculty[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faculty';
  }

}
