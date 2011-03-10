<?php

/**
 * ACompetencies form base class.
 *
 * @method ACompetencies getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseACompetenciesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'           => new sfWidgetFormInputHidden(),
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => false)),
      'competency_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competency'), 'add_empty' => false)),
      'description'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'aid'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'))),
      'competency_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Competency'))),
      'description'   => new sfValidatorString(array('max_length' => 35, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_competencies[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ACompetencies';
  }

}
