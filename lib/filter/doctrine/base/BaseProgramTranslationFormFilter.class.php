<?php

/**
 * ProgramTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProgramTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'program'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'program'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('program_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProgramTranslation';
  }

  public function getFields()
  {
    return array(
      'program_id' => 'Number',
      'program'    => 'Text',
      'lang'       => 'Text',
    );
  }
}
