<?php

/**
 * ACertifications filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseACertificationsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'aid'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumni'), 'add_empty' => true)),
      'certification' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'institution'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'aid'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumni'), 'column' => 'aid')),
      'certification' => new sfValidatorPass(array('required' => false)),
      'institution'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_certifications_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ACertifications';
  }

  public function getFields()
  {
    return array(
      'did'           => 'Number',
      'aid'           => 'ForeignKey',
      'certification' => 'Text',
      'institution'   => 'Text',
    );
  }
}
