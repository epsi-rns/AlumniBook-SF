<?php

/**
 * Province filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProvinceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'province'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'province'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('province_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Province';
  }

  public function getFields()
  {
    return array(
      'province_id' => 'Number',
      'province'    => 'Text',
    );
  }
}
