<?php

/**
 * AOMap form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OMapForm extends AOMapForm
{
  public function configure()
  {	
	$this->widgetSchema['org_id'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['department']->setLabel('Department ');	
	
	$this->widgetSchema['aid'] = new sfWidgetFormInputLookupModal(
		array(	'model' => 'Alumni', 
				'link_text' => 'Pick Alumni', 
				'link_route' => 'modal/alumni'),
		array(	'class' => 'icon_pick', 
				'title' => 'Lookup Alumni Name')
	);
	$this->widgetSchema['aid']->setLabel('Alumni');
	$this->validatorSchema['aid'] = new sfValidatorPass(); 
	
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
