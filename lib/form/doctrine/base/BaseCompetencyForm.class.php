<?php

/**
 * Competency form base class.
 *
 * @method Competency getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetencyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'competency_id' => new sfWidgetFormInputHidden(),
      'memo'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'competency_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('competency_id')), 'empty_value' => $this->getObject()->get('competency_id'), 'required' => false)),
      'memo'          => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competency[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Competency';
  }

}
