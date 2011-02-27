<?php

/**
 * omap components.
 *
 * @package    alumni
 * @subpackage omap
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class omapComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Organization')
	    ->th('Job Position')
	    ->th('Department ')	// note: space for ambiguous translation
	    ->th('Description')	    
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('show'), 
		'omap/show?'.'mid='.$row->get('mid'), $this->attr_show);
	  $link_alumni = link_to($alumni->getFullname(), 
		'alumni/detail?'.'aid='.$row->get('aid')); 
	  $link_org = link_to($row->getOrganization()->getFullname(), 
		'org/detail?'.'org_id='.$row->get('org_id'));
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($link_org)		
		->td($row->getJobPosition())
		->td($row->getDepartment())
		->td($row->getDescription())
		->write();
	}
}
