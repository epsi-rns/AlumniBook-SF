<?php

/**
 * Province form base class.
 *
 * @method Province getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProvinceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'province_id' => new sfWidgetFormInputHidden(),
      'province'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'province_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('province_id')), 'empty_value' => $this->getObject()->get('province_id'), 'required' => false)),
      'province'    => new sfValidatorString(array('max_length' => 30)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Province', 'column' => array('province')))
    );

    $this->widgetSchema->setNameFormat('province[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Province';
  }

}
