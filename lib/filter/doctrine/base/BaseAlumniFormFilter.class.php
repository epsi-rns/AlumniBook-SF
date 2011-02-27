<?php

/**
 * Alumni filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlumniFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prefix'      => new sfWidgetFormFilterInput(),
      'suffix'      => new sfWidgetFormFilterInput(),
      'note'        => new sfWidgetFormFilterInput(),
      'gender'      => new sfWidgetFormFilterInput(),
      'birthplace'  => new sfWidgetFormFilterInput(),
      'birthdate'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'religion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Religion'), 'add_empty' => true)),
      'fullname'    => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'prefix'      => new sfValidatorPass(array('required' => false)),
      'suffix'      => new sfValidatorPass(array('required' => false)),
      'note'        => new sfValidatorPass(array('required' => false)),
      'gender'      => new sfValidatorPass(array('required' => false)),
      'birthplace'  => new sfValidatorPass(array('required' => false)),
      'birthdate'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'religion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Religion'), 'column' => 'religion_id')),
      'fullname'    => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('alumni_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumni';
  }

  public function getFields()
  {
    return array(
      'aid'         => 'Number',
      'name'        => 'Text',
      'prefix'      => 'Text',
      'suffix'      => 'Text',
      'note'        => 'Text',
      'gender'      => 'Text',
      'birthplace'  => 'Text',
      'birthdate'   => 'Date',
      'religion_id' => 'ForeignKey',
      'fullname'    => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
