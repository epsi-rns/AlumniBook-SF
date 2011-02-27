<?php

/**
 * JobTypeTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJobTypeTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_type'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'job_type'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('job_type_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobTypeTranslation';
  }

  public function getFields()
  {
    return array(
      'job_type_id' => 'Number',
      'job_type'    => 'Text',
      'lang'        => 'Text',
    );
  }
}
