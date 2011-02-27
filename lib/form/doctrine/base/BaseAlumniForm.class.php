<?php

/**
 * Alumni form base class.
 *
 * @method Alumni getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlumniForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'         => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'prefix'      => new sfWidgetFormInputText(),
      'suffix'      => new sfWidgetFormInputText(),
      'note'        => new sfWidgetFormTextarea(),
      'gender'      => new sfWidgetFormInputText(),
      'birthplace'  => new sfWidgetFormInputText(),
      'birthdate'   => new sfWidgetFormDate(),
      'religion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Religion'), 'add_empty' => true)),
      'fullname'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'aid'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('aid')), 'empty_value' => $this->getObject()->get('aid'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'prefix'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'suffix'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'note'        => new sfValidatorString(array('required' => false)),
      'gender'      => new sfValidatorPass(array('required' => false)),
      'birthplace'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'birthdate'   => new sfValidatorDate(array('required' => false)),
      'religion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Religion'), 'required' => false)),
      'fullname'    => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Alumni', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('alumni[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumni';
  }

}
