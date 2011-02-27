<?php

/**
 * CompetencyTranslation form base class.
 *
 * @method CompetencyTranslation getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetencyTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'competency_id' => new sfWidgetFormInputHidden(),
      'competency'    => new sfWidgetFormInputText(),
      'lang'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'competency_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('competency_id')), 'empty_value' => $this->getObject()->get('competency_id'), 'required' => false)),
      'competency'    => new sfValidatorString(array('max_length' => 30)),
      'lang'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CompetencyTranslation', 'column' => array('competency')))
    );

    $this->widgetSchema->setNameFormat('competency_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetencyTranslation';
  }

}
