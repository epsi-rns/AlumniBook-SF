<?php

/**
 * ACompetencies filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseACompetenciesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'competency_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competency'), 'add_empty' => true)),
      'description'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'aid'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'competency_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Competency'), 'column' => 'competency_id')),
      'description'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_competencies_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ACompetencies';
  }

  public function getFields()
  {
    return array(
      'did'           => 'Number',
      'aid'           => 'ForeignKey',
      'competency_id' => 'ForeignKey',
      'description'   => 'Text',
    );
  }
}
