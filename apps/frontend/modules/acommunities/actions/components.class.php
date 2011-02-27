<?php

/**
 * acommunities components.
 *
 * @package    alumni
 * @subpackage acommunities
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class acommunitiesComponents extends sheetComponentsExt
{
	protected function getTitle($row) 
	{ 
		$one = $row->getAlumni();
		return $this->salute($one).' '.$one->getName(); 
	}		
	
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Full Name')	
	    ->th('Community')
	    ->write();
	 }

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();
	  
	  $link_editor = link_to(__('edit'), 
		'acommunities/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni->getFullname(), 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni.$this->PastDateImg($alumni->get('created_at')))
		->td($row->get('community'), 'width="40%"')
		->write();
	}	
}
