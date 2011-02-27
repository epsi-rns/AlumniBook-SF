<?php

/**
 * acommunities components.
 *
 * @package    alumni
 * @subpackage acommunities
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class acompetenciesComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community')
	    ->th('Competency')
	    ->th('Description')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'acompetencies/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst())
		->td($row->getCompetency())
		->td($row->getDescription())
		->write();
	}
}
