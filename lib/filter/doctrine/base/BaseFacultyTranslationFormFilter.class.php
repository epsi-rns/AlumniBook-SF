<?php

/**
 * FacultyTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFacultyTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faculty'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'faculty'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faculty_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacultyTranslation';
  }

  public function getFields()
  {
    return array(
      'faculty_id' => 'Number',
      'faculty'    => 'Text',
      'lang'       => 'Text',
    );
  }
}
