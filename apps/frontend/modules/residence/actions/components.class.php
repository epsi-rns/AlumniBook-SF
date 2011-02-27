<?php

/**
 * residence components.
 *
 * @package    alumni
 * @subpackage residence
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class residenceComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Address')
	    ->th('Region')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'residence/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$row->get('lid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($row->getAddress())
		->td($row->getRegion())
		->write();
	}
}
