<?php

/**
 * Country form base class.
 *
 * @method Country getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCountryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'country_id' => new sfWidgetFormInputHidden(),
      'country'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'country_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('country_id')), 'empty_value' => $this->getObject()->get('country_id'), 'required' => false)),
      'country'    => new sfValidatorString(array('max_length' => 35)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Country', 'column' => array('country')))
    );

    $this->widgetSchema->setNameFormat('country[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Country';
  }

}
