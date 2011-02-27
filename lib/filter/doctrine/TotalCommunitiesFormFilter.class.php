<?php

/**
 * TotalCommunities filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class TotalCommunitiesFormFilter extends BaseACommunitiesFormFilter
{
	static protected $group_by_choices = array(
		1 => 'Community',
		2 => 'Department',
		3 => 'Faculty',
		4 => 'Program',
		5 => 'Class of (year)',
		6 => 'Detail Community'
	);			
		
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    	
    $this->widgetSchema['group_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$group_by_choices));
    $this->validatorSchema['group_by'] = new sfValidatorPass(); 
      
    $this->useFields(array('group_by'));	
  }
}
 
