<?php

/**
 * BizFieldTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBizFieldTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'biz_field'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'biz_field'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('biz_field_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BizFieldTranslation';
  }

  public function getFields()
  {
    return array(
      'biz_field_id' => 'Number',
      'biz_field'    => 'Text',
      'lang'         => 'Text',
    );
  }
}
