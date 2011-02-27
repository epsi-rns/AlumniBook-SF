<?php

/**
 * AMap form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AMapForm extends AOMapForm
{
  public function configure()
  {
	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['department']->setLabel('Department ');	
	
	$this->widgetSchema['org_id'] = new sfWidgetFormInputLookupModal(
		array(	'model' => 'Organization', 
				'link_text' => 'Pick Organization/ Company', 
				'link_route' => 'modal/org'),
		array(	'class' => 'icon_pick', 
				'title' => 'Lookup Organization/ Company Name')
	);
	$this->widgetSchema['org_id']->setLabel('Organization');
	$this->validatorSchema['org_id'] = new sfValidatorPass(); 
	
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
