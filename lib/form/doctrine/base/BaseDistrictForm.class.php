<?php

/**
 * District form base class.
 *
 * @method District getObject() Returns the current form's model object
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDistrictForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'district_id' => new sfWidgetFormInputHidden(),
      'district'    => new sfWidgetFormInputText(),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'district_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('district_id')), 'empty_value' => $this->getObject()->get('district_id'), 'required' => false)),
      'district'    => new sfValidatorString(array('max_length' => 30)),
      'province_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Province'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'District', 'column' => array('district')))
    );

    $this->widgetSchema->setNameFormat('district[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'District';
  }

}
