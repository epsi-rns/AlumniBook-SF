<?php

/**
 * Competency filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompetencyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'memo'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'memo'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competency_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Competency';
  }

  public function getFields()
  {
    return array(
      'competency_id' => 'Number',
      'memo'          => 'Text',
    );
  }
}
