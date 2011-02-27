<?php

/**
 * acertifications components.
 *
 * @package    alumni
 * @subpackage acertifications
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class acertificationsComponents extends sheetComponentsExt
{
	protected function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')	
	    ->th('Community')
	    ->th('Certification')
	    ->th('Institution')
	    ->write();
	}	

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();

		$link_editor = link_to(__('edit'), 
			'acertifications/edit?'
			.'did='.$row->get('did'), $this->attr);
		$link_alumni = link_to($alumni, 
			'alumni/detail?'.'aid='.$row->getAid()); 
		
		$this
		  ->td_action($link_editor)
		  ->td($link_alumni)	
		  ->td($communities->getFirst())	
		  ->td($row->getCertification())
		  ->td($row->getInstitution())
		  ->write();
	}	
}
