<?php

/**
 * mcontacts components.
 *
 * @package    alumni
 * @subpackage mcontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class mcontactsComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Organization')
	    ->th('Type')
	    ->th('Contact')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $ao_map = $row->getAOMap();
	  $alumni = $ao_map->getAlumni();
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'mcontacts/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$ao_map->get('aid')); 
	  $link_org = link_to($ao_map->getOrganization(), 
		'org/detail?'.'org_id='.$ao_map->get('org_id'));
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($link_org)		
		->td($row->getContactType())
		->td($row->getContact())
		->write();
	}
}
