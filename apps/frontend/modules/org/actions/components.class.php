<?php

/**
 * org components.
 *
 * @package    alumni
 * @subpackage org
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class orgComponents extends sheetComponentsExt
{
	private $action;
	
	public function executeShow()
	{
		$request = $this->getRequest();
		$this->action = $request->getParameter('action');
		
		return parent::executeShow();
	}
	
	protected function doTableHeader() 
	{
		if	($this->action=='filter')
			$this->doFilterTableHeader();
		else
			$this->doIndexTableHeader();
	}
	
	protected function doRow($row) 
	{
		if	($this->action=='filter')
			$this->doFilterRow($row);
		else
			$this->doIndexRow($row);
	}		

	// index action
	private function doIndexTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Name')
	    ->th('Last Update')
	    ->th('Note')
	    ->write();	
	} 	

	private function doIndexRow($row) 
	{
	  $link_editor = link_to(__('show'), 
		'org/show?'.'org_id='.$row->get('org_id'), $this->attr_show);
	  $link_org = link_to($this->textShort($row->getFullname(), 20), 
		'org/detail?'.'org_id='.$row->get('org_id')); 
		
	  $this
		->td_action($link_editor)
		->td($link_org.$this->PastDateImg($row->get('created_at')))
		->td($row->getUpdatedAt())
		->td($this->textShort($row->getNote(), 20))
		->write();
	}

	// filter action
	private function doFilterTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Name')
	    ->th('Product')
	    ->write();	
	}

	private function doFilterRow($row) 
	{
	  $link_editor = link_to(__('edit'), 
		'org/edit?'.'org_id='.$row->get('org_id'), $this->attr);
	  $link_org = link_to($row->getFullname(), 
		'org/detail?'.'org_id='.$row->get('org_id')); 
		
	  $this
		->td_action($link_editor)
		->td($link_org.$this->PastDateImg($row->get('created_at')))
		->td($row->getProduct())
		->write();
	}
}
