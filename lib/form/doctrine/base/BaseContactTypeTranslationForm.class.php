<?php

/**
 * ContactTypeTranslation form base class.
 *
 * @method ContactTypeTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactTypeTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ct_id'        => new sfWidgetFormInputHidden(),
      'contact_type' => new sfWidgetFormInputText(),
      'lang'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'ct_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ct_id')), 'empty_value' => $this->getObject()->get('ct_id'), 'required' => false)),
      'contact_type' => new sfValidatorString(array('max_length' => 25)),
      'lang'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ContactTypeTranslation', 'column' => array('contact_type')))
    );

    $this->widgetSchema->setNameFormat('contact_type_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactTypeTranslation';
  }

}
