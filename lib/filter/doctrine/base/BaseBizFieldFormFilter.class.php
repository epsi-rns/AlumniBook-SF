<?php

/**
 * BizField filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBizFieldFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biz_field_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BizField';
  }

  public function getFields()
  {
    return array(
      'biz_field_id' => 'Number',
      'description'  => 'Text',
    );
  }
}
