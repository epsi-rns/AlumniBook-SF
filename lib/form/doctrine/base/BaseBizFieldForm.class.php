<?php

/**
 * BizField form base class.
 *
 * @method BizField getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBizFieldForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'biz_field_id' => new sfWidgetFormInputHidden(),
      'description'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'biz_field_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('biz_field_id')), 'empty_value' => $this->getObject()->get('biz_field_id'), 'required' => false)),
      'description'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biz_field[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BizField';
  }

}
