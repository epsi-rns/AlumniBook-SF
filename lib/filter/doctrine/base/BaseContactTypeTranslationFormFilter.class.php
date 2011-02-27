<?php

/**
 * ContactTypeTranslation filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactTypeTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_type' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'contact_type' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_type_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactTypeTranslation';
  }

  public function getFields()
  {
    return array(
      'ct_id'        => 'Number',
      'contact_type' => 'Text',
      'lang'         => 'Text',
    );
  }
}
