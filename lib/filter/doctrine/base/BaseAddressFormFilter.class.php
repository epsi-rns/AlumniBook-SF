<?php

/**
 * Address filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAddressFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'lid'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link_type'   => new sfWidgetFormFilterInput(),
      'area'        => new sfWidgetFormFilterInput(),
      'building'    => new sfWidgetFormFilterInput(),
      'street'      => new sfWidgetFormFilterInput(),
      'postal_code' => new sfWidgetFormFilterInput(),
      'country_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => true)),
      'district_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'add_empty' => true)),
      'address'     => new sfWidgetFormFilterInput(),
      'region'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'lid'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'link_type'   => new sfValidatorPass(array('required' => false)),
      'area'        => new sfValidatorPass(array('required' => false)),
      'building'    => new sfValidatorPass(array('required' => false)),
      'street'      => new sfValidatorPass(array('required' => false)),
      'postal_code' => new sfValidatorPass(array('required' => false)),
      'country_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'country_id')),
      'province_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Province'), 'column' => 'province_id')),
      'district_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('District'), 'column' => 'district_id')),
      'address'     => new sfValidatorPass(array('required' => false)),
      'region'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

  public function getFields()
  {
    return array(
      'did'         => 'Number',
      'lid'         => 'Number',
      'link_type'   => 'Text',
      'area'        => 'Text',
      'building'    => 'Text',
      'street'      => 'Text',
      'postal_code' => 'Text',
      'country_id'  => 'ForeignKey',
      'province_id' => 'ForeignKey',
      'district_id' => 'ForeignKey',
      'address'     => 'Text',
      'region'      => 'Text',
    );
  }
}
