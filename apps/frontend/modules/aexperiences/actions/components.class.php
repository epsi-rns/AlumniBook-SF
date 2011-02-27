<?php

/**
 * aexperiences components.
 *
 * @package    alumni
 * @subpackage aexperiences
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class aexperiencesComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Experience')
	    ->th('Description')
	    ->th('Job position')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'aexperiences/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($row->getOrganization())
		->td($row->getDescription())
		->td($row->getJobPosition())
		->write();
	}
}
