<?php

/**
 * OFields filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOFieldsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'org_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
      'biz_field_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BizField'), 'add_empty' => true)),
      'description'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'org_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organization'), 'column' => 'org_id')),
      'biz_field_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BizField'), 'column' => 'biz_field_id')),
      'description'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('o_fields_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OFields';
  }

  public function getFields()
  {
    return array(
      'did'          => 'Number',
      'org_id'       => 'ForeignKey',
      'biz_field_id' => 'ForeignKey',
      'description'  => 'Text',
    );
  }
}
