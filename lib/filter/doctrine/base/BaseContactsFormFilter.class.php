<?php

/**
 * Contacts filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'lid'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link_type' => new sfWidgetFormFilterInput(),
      'ct_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContactType'), 'add_empty' => true)),
      'contact'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'lid'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'link_type' => new sfValidatorPass(array('required' => false)),
      'ct_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContactType'), 'column' => 'ct_id')),
      'contact'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contacts_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacts';
  }

  public function getFields()
  {
    return array(
      'did'       => 'Number',
      'lid'       => 'Number',
      'link_type' => 'Text',
      'ct_id'     => 'ForeignKey',
      'contact'   => 'Text',
    );
  }
}
