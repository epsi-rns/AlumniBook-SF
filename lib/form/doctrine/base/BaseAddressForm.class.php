<?php

/**
 * Address form base class.
 *
 * @method Address getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'         => new sfWidgetFormInputHidden(),
      'lid'         => new sfWidgetFormInputText(),
      'link_type'   => new sfWidgetFormInputText(),
      'area'        => new sfWidgetFormInputText(),
      'building'    => new sfWidgetFormInputText(),
      'street'      => new sfWidgetFormInputText(),
      'postal_code' => new sfWidgetFormInputText(),
      'country_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => true)),
      'district_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'add_empty' => true)),
      'address'     => new sfWidgetFormInputText(),
      'region'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'lid'         => new sfValidatorInteger(),
      'link_type'   => new sfValidatorPass(array('required' => false)),
      'area'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'building'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'street'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'postal_code' => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'country_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'province_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'required' => false)),
      'district_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'required' => false)),
      'address'     => new sfValidatorString(array('max_length' => 175, 'required' => false)),
      'region'      => new sfValidatorString(array('max_length' => 110, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

}
