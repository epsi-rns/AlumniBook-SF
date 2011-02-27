<?php

/**
 * AOMap form base class.
 *
 * @method AOMap getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAOMapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mid'             => new sfWidgetFormInputHidden(),
      'aid'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => false)),
      'org_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => false)),
      'department'      => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormInputText(),
      'struktural'      => new sfWidgetFormInputText(),
      'fungsional'      => new sfWidgetFormInputText(),
      'job_type_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobType'), 'add_empty' => true)),
      'job_position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobPosition'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'mid'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mid')), 'empty_value' => $this->getObject()->get('mid'), 'required' => false)),
      'aid'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'))),
      'org_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'))),
      'department'      => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'description'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'struktural'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fungsional'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'job_type_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JobType'), 'required' => false)),
      'job_position_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JobPosition'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ao_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AOMap';
  }

}
