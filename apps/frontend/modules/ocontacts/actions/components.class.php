<?php

/**
 * ocontacts components.
 *
 * @package    alumni
 * @subpackage ocontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class ocontactsComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Organization')
	    ->th('Type')
	    ->th('Contact')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $link_editor = link_to(__('edit'), 
		'ocontacts/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_org = link_to($row->getOrganization(), 
		'org/detail?'.'org_id='.$row->get('lid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_org)
		->td($row->getContactType())
		->td($row->getContact())
		->write();
	}
}
