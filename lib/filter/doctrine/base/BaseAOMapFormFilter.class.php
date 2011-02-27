<?php

/**
 * AOMap filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAOMapFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'org_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organization'), 'add_empty' => true)),
      'department'      => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'struktural'      => new sfWidgetFormFilterInput(),
      'fungsional'      => new sfWidgetFormFilterInput(),
      'job_type_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobType'), 'add_empty' => true)),
      'job_position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JobPosition'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'aid'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'org_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organization'), 'column' => 'org_id')),
      'department'      => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'struktural'      => new sfValidatorPass(array('required' => false)),
      'fungsional'      => new sfValidatorPass(array('required' => false)),
      'job_type_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JobType'), 'column' => 'job_type_id')),
      'job_position_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JobPosition'), 'column' => 'job_position_id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ao_map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AOMap';
  }

  public function getFields()
  {
    return array(
      'mid'             => 'Number',
      'aid'             => 'ForeignKey',
      'org_id'          => 'ForeignKey',
      'department'      => 'Text',
      'description'     => 'Text',
      'struktural'      => 'Text',
      'fungsional'      => 'Text',
      'job_type_id'     => 'ForeignKey',
      'job_position_id' => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
