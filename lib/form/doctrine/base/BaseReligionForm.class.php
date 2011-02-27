<?php

/**
 * Religion form base class.
 *
 * @method Religion getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReligionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'religion_id' => new sfWidgetFormInputHidden(),
      'religion'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'religion_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('religion_id')), 'empty_value' => $this->getObject()->get('religion_id'), 'required' => false)),
      'religion'    => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Religion', 'column' => array('religion')))
    );

    $this->widgetSchema->setNameFormat('religion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Religion';
  }

}
