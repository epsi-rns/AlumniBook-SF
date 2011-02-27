<?php

/**
 * JobPositionTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJobPositionTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_position'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'job_position'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('job_position_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobPositionTranslation';
  }

  public function getFields()
  {
    return array(
      'job_position_id' => 'Number',
      'job_position'    => 'Text',
      'lang'            => 'Text',
    );
  }
}
