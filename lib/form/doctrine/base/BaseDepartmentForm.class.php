<?php

/**
 * Department form base class.
 *
 * @method Department getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDepartmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'department_id' => new sfWidgetFormInputHidden(),
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'department_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('department_id')), 'empty_value' => $this->getObject()->get('department_id'), 'required' => false)),
      'faculty_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Department';
  }

}
