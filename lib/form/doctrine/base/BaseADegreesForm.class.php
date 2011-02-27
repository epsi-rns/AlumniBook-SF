<?php

/**
 * ADegrees form base class.
 *
 * @method ADegrees getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseADegreesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'           => new sfWidgetFormInputHidden(),
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => false)),
      'strata_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Strata'), 'add_empty' => true)),
      'admitted'      => new sfWidgetFormInputText(),
      'graduated'     => new sfWidgetFormInputText(),
      'degree'        => new sfWidgetFormInputText(),
      'institution'   => new sfWidgetFormInputText(),
      'major'         => new sfWidgetFormInputText(),
      'minor'         => new sfWidgetFormInputText(),
      'concentration' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'aid'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'))),
      'strata_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Strata'), 'required' => false)),
      'admitted'      => new sfValidatorInteger(array('required' => false)),
      'graduated'     => new sfValidatorInteger(array('required' => false)),
      'degree'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'institution'   => new sfValidatorString(array('max_length' => 40)),
      'major'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'minor'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'concentration' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_degrees[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ADegrees';
  }

}
