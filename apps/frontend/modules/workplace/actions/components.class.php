<?php

/**
 * workplace components.
 *
 * @package    alumni
 * @subpackage workplace
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class workplaceComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Organization')
	    ->th('Address')
	    ->th('Region')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $ao_map = $row->getAOMap();
	  $alumni = $ao_map->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'workplace/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$ao_map->get('aid')); 
	  $link_org = link_to($ao_map->getOrganization(), 
		'org/detail?'.'org_id='.$ao_map->get('org_id')); 		
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($link_org)
		->td($row->getAddress())
		->td($row->getRegion())
		->write();
	}
}
