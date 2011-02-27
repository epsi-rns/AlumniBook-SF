<?php

/**
 * ofields components.
 *
 * @package    alumni
 * @subpackage ofields
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class ofieldsComponents extends sheetComponentsExt
{
	function doTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Organization')
	    ->th('Product')
	    ->th('Business Field')
	    ->th('Description')
	    ->write();	
	}

	protected function doRow($row) 
	{
	  $org = $row->getOrganization();
      
	  $link_editor = link_to(__('edit'), 
		'ofields/edit?'.'did='.$row->get('did'), $this->attr);
	  $link_org = link_to($org->getFullname(), 
		'org/detail?'.'org_id='.$row->get('org_id')); 
		
	  $this
		->td_action($link_editor)
		->td($link_org)
		->td($org->getProduct())
		->td($row->getBizField())
		->td($row->getDescription())
		->write();
	}
}
