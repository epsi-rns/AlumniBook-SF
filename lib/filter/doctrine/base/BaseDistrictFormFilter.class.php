<?php

/**
 * District filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDistrictFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'district'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'district'    => new sfValidatorPass(array('required' => false)),
      'province_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Province'), 'column' => 'province_id')),
    ));

    $this->widgetSchema->setNameFormat('district_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'District';
  }

  public function getFields()
  {
    return array(
      'district_id' => 'Number',
      'district'    => 'Text',
      'province_id' => 'ForeignKey',
    );
  }
}
