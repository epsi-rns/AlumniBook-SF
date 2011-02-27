<?php

/**
 * office components.
 *
 * @package    alumni
 * @subpackage office
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class officeComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{ 
	  $this
	    ->th_action()
	    ->th('Organization')
	    ->th('Address')
	    ->th('Region')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $link_editor = link_to(__('edit'), 
		'office/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_org = link_to($row->getOrganization(), 
		'org/detail?'.'org_id='.$row->get('lid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_org)
		->td($row->getAddress())
		->td($row->getRegion())
		->write();
	}
}
