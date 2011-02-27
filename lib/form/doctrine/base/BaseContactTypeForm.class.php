<?php

/**
 * ContactType form base class.
 *
 * @method ContactType getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ct_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'ct_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ct_id')), 'empty_value' => $this->getObject()->get('ct_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactType';
  }

}
