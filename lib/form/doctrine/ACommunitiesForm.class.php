<?php

/**
 * ACommunities form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ACommunitiesForm extends BaseACommunitiesForm
{
  public function configure()
  {    
	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
	
    unset(
      $this['community'], $this['program_id'],
      $this['faculty_id'], $this['department_id']
    );
    
	$this->widgetSchema['cid'] = new sfWidgetFormInputLookupModal(
		array(	'model' => $this->getRelatedModelName('Community'), 
				'link_text' => 'Pick Community', 
				'link_route' => 'modal/community'),
		array(	'class' => 'icon_pick', 
				'title' => 'Lookup Community Name')
	);    
    $this->widgetSchema->setLabels(array(
		'cid' => 'Campus Community',
		'class_year'	=> 'Class of (year)',
		'class_sub'		=> 'Sub Class (optional)',
	));

  }
}
