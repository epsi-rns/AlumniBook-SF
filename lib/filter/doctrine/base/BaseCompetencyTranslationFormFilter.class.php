<?php

/**
 * CompetencyTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompetencyTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'competency'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'competency'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competency_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetencyTranslation';
  }

  public function getFields()
  {
    return array(
      'competency_id' => 'Number',
      'competency'    => 'Text',
      'lang'          => 'Text',
    );
  }
}
