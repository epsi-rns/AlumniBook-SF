<?php

/**
 * acontacts components.
 *
 * @package    alumni
 * @subpackage acontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class acontactsComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Type')
	    ->th('Contact')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'acontacts/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$row->get('lid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($row->getContactType())
		->td($row->getContact())
		->write();
	}
}
