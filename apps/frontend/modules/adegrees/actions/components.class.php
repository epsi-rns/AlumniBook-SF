<?php

/**
 * adegrees components.
 *
 * @package    alumni
 * @subpackage adegrees
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class adegreesComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Alumni')
	    ->th('Community');
	    
	  if ($this->editor) $this
	    ->th('Strata')
	    ->th('Admitted')
	    ->th('Graduated');	    
	    
	  $this  
	    ->th('Degree')
	    ->th('Institution')
	    ->th('Major')
	    ->th('Minor')
	    ->th('Concentration')
	    ->write();
	} 

	protected function doRow($row) 
	{
	  $alumni = $row->getAlumni();	
	  $communities = $alumni->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'adegrees/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_alumni = link_to($alumni, 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni)
		->td($communities->getFirst());

	  if ($this->editor) $this	
		->td($row->getStrata())
		->td($row->getStrata())
		->td($row->getGraduated());
	
	  $this
	  	->td($row->getDegree())
		->td($row->getInstitution())
		->td($row->getMajor())
		->td($row->getMinor())
		->td($row->getConcentration())
		->write();
	}
}
