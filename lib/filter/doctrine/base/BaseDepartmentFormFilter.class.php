<?php

/**
 * Department filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDepartmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faculty_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faculty'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'faculty_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Faculty'), 'column' => 'faculty_id')),
    ));

    $this->widgetSchema->setNameFormat('department_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Department';
  }

  public function getFields()
  {
    return array(
      'department_id' => 'Number',
      'faculty_id'    => 'ForeignKey',
    );
  }
}
