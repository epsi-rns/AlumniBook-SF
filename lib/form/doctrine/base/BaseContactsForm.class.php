<?php

/**
 * Contacts form base class.
 *
 * @method Contacts getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'did'       => new sfWidgetFormInputHidden(),
      'lid'       => new sfWidgetFormInputText(),
      'link_type' => new sfWidgetFormInputText(),
      'ct_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContactType'), 'add_empty' => false)),
      'contact'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'did'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('did')), 'empty_value' => $this->getObject()->get('did'), 'required' => false)),
      'lid'       => new sfValidatorInteger(),
      'link_type' => new sfValidatorPass(array('required' => false)),
      'ct_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContactType'))),
      'contact'   => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('contacts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacts';
  }

}
