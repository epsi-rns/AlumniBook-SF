<?php

/**
 * Field form base class.
 *
 * @method Field getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFieldForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'field_id'    => new sfWidgetFormInputHidden(),
      'field'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'field_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('field_id')), 'empty_value' => $this->getObject()->get('field_id'), 'required' => false)),
      'field'       => new sfValidatorString(array('max_length' => 35)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Field', 'column' => array('field')))
    );

    $this->widgetSchema->setNameFormat('field[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Field';
  }

}
