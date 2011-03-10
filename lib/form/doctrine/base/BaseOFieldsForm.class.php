<?php

/**
 * OFields form base class.
 *
 * @method OFields getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOFieldsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'          => new sfWidgetFormInputHidden(),
      'org_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => false)),
      'biz_field_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BizField'), 'add_empty' => false)),
      'description'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'org_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'))),
      'biz_field_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BizField'))),
      'description'  => new sfValidatorString(array('max_length' => 35, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('o_fields[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OFields';
  }

}
