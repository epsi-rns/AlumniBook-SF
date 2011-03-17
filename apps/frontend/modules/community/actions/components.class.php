<?php

/**
 * community components.
 *
 * @package    alumni
 * @subpackage community
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class communityComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Type')
	    ->th('Community')	    
	    ->th('Brief')	    
	    ->th('Members')
		->th('Department')
	    ->th('Faculty')
	    ->th('Program')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $link_editor = link_to(__('edit'), 
		'community/edit?'.'cid='.$row->get('cid'), $this->attr);
	  $link_comy = link_to($row->get('community'), 
		'acommunities/filter'.
		'?prog='.$row->getProgramId().
		'&fcly='.$row->getFacultyId().
		'&dept='.$row->getDepartmentId()
	  ); 	  
	  $link_dept = link_to($row->getDepartment(), 
		'acommunities/filter'.
		'?fcly='.$row->getFacultyId().
		'&dept='.$row->getDepartmentId()
	  ); 
	  $link_fcly = link_to($row->getFaculty(), 
		'acommunities/filter'.
		'?fcly='.$row->getFacultyId()
	  );
	  $link_prog = link_to($row->getProgram(), 
		'acommunities/filter'.
		'?prog='.$row->getProgramId()
	  );
	  $total = $row->getTotal() ?  $row->getTotal() : '';
	  $type = ($row->get('type_id')==2)? 'Club' : 'Formal';
	  		
	  $this
		->td_action($link_editor)
		->td($type)
		->td($link_comy)
		->td($row->getBrief())		
		->td($total)
		->td($link_dept)
		->td($link_fcly)
		->td($link_prog)
		->write();
	}
}
