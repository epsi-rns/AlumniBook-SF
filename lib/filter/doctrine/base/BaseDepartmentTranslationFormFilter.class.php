<?php

/**
 * DepartmentTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDepartmentTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'department'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'department'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DepartmentTranslation';
  }

  public function getFields()
  {
    return array(
      'department_id' => 'Number',
      'department'    => 'Text',
      'lang'          => 'Text',
    );
  }
}
