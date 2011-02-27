<?php

/**
 * amap components.
 *
 * @package    alumni
 * @subpackage amap
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class amapComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Organization')
	    ->th('Occupation')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('show'), 
		'amap/show?'.'mid='.$row->get('mid'), $this->attr_show);
	  $link_alumni = link_to($alumni->getFullname(), 
		'alumni/detail?'.'aid='.$row->get('aid')); 
	  $link_org = link_to($row->getOrganization()->getFullname(), 
		'org/detail?'.'org_id='.$row->get('org_id'));
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($link_org)		
		->td($row->getJobType())
		->write();
	} 
}
