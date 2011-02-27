<?php

/**
 * Strata form base class.
 *
 * @method Strata getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStrataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'strata_id' => new sfWidgetFormInputHidden(),
      'strata'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'strata_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('strata_id')), 'empty_value' => $this->getObject()->get('strata_id'), 'required' => false)),
      'strata'    => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Strata', 'column' => array('strata')))
    );

    $this->widgetSchema->setNameFormat('strata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Strata';
  }

}
