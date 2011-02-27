<?php

/**
 * BizFieldTranslation form base class.
 *
 * @method BizFieldTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBizFieldTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'biz_field_id' => new sfWidgetFormInputHidden(),
      'biz_field'    => new sfWidgetFormInputText(),
      'lang'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'biz_field_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('biz_field_id')), 'empty_value' => $this->getObject()->get('biz_field_id'), 'required' => false)),
      'biz_field'    => new sfValidatorString(array('max_length' => 35)),
      'lang'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BizFieldTranslation', 'column' => array('biz_field')))
    );

    $this->widgetSchema->setNameFormat('biz_field_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BizFieldTranslation';
  }

}
