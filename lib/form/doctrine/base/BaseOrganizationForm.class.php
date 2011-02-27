<?php

/**
 * Organization form base class.
 *
 * @method Organization getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrganizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'org_id'     => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'prefix'     => new sfWidgetFormInputText(),
      'suffix'     => new sfWidgetFormInputText(),
      'note'       => new sfWidgetFormTextarea(),
      'product'    => new sfWidgetFormInputText(),
      'fullname'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'root_id'    => new sfWidgetFormInputText(),
      'lft'        => new sfWidgetFormInputText(),
      'rgt'        => new sfWidgetFormInputText(),
      'level'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'org_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('org_id')), 'empty_value' => $this->getObject()->get('org_id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 50)),
      'prefix'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'suffix'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'note'       => new sfValidatorString(array('required' => false)),
      'product'    => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'fullname'   => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'root_id'    => new sfValidatorInteger(array('required' => false)),
      'lft'        => new sfValidatorInteger(array('required' => false)),
      'rgt'        => new sfValidatorInteger(array('required' => false)),
      'level'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Organization', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('organization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organization';
  }

}
