<?php

/**
 * DepartmentTranslation form base class.
 *
 * @method DepartmentTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDepartmentTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'department_id' => new sfWidgetFormInputHidden(),
      'department'    => new sfWidgetFormInputText(),
      'lang'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'department_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('department_id')), 'empty_value' => $this->getObject()->get('department_id'), 'required' => false)),
      'department'    => new sfValidatorString(array('max_length' => 40)),
      'lang'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'DepartmentTranslation', 'column' => array('department')))
    );

    $this->widgetSchema->setNameFormat('department_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DepartmentTranslation';
  }

}
