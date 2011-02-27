<?php

/**
 * alumni components.
 *
 * @package    alumni
 * @subpackage alumni
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class alumniComponents extends sheetComponentsExt
{
	private $action;
	
	public function executeShow()
	{
		
		
		$request = $this->getRequest();
		$this->action = $request->getParameter('action');
		
		// birth action
		$this->months = array (
			1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 
			5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 
			9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember' );
		$weekdays_fb = array(1 => "Senin", 2 => "Selasa", 3 => "Rabu", 4 => "Kamis",
			5 => "Jumat", 6 => "Sabtu", 0 => "Minggu");  // ISO 8601, Firebird, not mysql	
		$weekdays_my = array(0 => "Senin", 1 => "Selasa", 2 => "Rabu", 3 => "Kamis",
			4 => "Jumat", 5 => "Sabtu", 6 => "Minggu"); 
		$this->weekdays = $weekdays_my;
		
		return parent::executeShow();
	}
	
	protected function getTitle($row) 
	{
		if	($this->action=='birth')
			return $this->getBirthTitle($row);
		else
			return;
	}

	protected function doTableHeader() 
	{
		if	($this->action=='birth')
			$this->doBirthTableHeader();
		else
			$this->doIndexTableHeader();
	}
	
	protected function doRow($row) 
	{
		if	($this->action=='birth')
			$this->doBirthRow($row);
		else
			$this->doIndexRow($row);
	}
		

	// index action
	private function doIndexTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Full Name')
	    ->th('Community')
	    ->th('Last Update')
	    ->th('Note')
	    ->write();	
	} 	

	private function doIndexRow($row) 
	{
	  $communities = $row->getACommunities();
      
	  $link_editor = link_to(__('show'), 
		'alumni/show?'.'aid='.$row->get('aid'), $this->attr_show);
	  $link_alumni = link_to($this->textShort($row->getFullname(), 20), 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni.$this->PastDateImg($row->get('created_at')))
		->td($this->getCommunityText($communities))
		->td($row->getUpdatedAt())
		->td($this->textShort($row->getNote(), 20))
		->write();
	}
	
	private function getCommunityText($communities)
	{
		$comies = array();
	
		foreach($communities as $community)
		{
			$comy = $community->getCommunity();
			$year = $community->get('class_year');
			$text = $this->textShort($comy, 15);
			if (!empty($year)) $text = $year.' - '.$comy;
			$comies[] = $text;
		}
	
		$text_comy = implode('<br/>', $comies);
		return $text_comy;
	}
	
	// birth action	
	protected function getBirthTitle($row) 
		{ return $this->salute($row).' '.$row->getName(); }	

	private function doBirthTableHeader() 
	{
	  $this
	    ->th_action()
	    ->th('Full Name')
	    ->th('Community')
	    ->th('Birth Date')
	    
	    ->th('Weekday')
	    ->th('Day')
	    ->th('Month')
	    ->th('Year')
	    ->write();	
	}

	private function doBirthRow($row) 
	{
	  $communities = $row->getACommunities();
      
	  $link_editor = link_to(__('edit'), 
		'alumni/edit?'.'aid='.$row->get('aid'), $this->attr);
	  $link_alumni = link_to($row->getFullname(), 
		'alumni/detail?'.'aid='.$row->get('aid')); 
		
	  $this
		->td_action($link_editor)
		->td($link_alumni.$this->PastDateImg($row->get('created_at')))
		->td($communities->getFirst())
		->td($row->getBirthdate())
		->td($this->weekdays[$row->get('a_weekday')])
		->td($row->get('a_day'))
	    ->td($this->months[$row->get('a_month')])
	    ->td($row->get('a_year'))
		->write();
	}
	
	public function getGroupStr($order_by, $row) 
	{ 	
		if (in_array($order_by, array(111, 112, 113, 114, 115)))
			$communities = $row->getACommunities();
			
		switch ($order_by) 
		{
			/* Not grouping either
			case 73: $result = $row->get('birthdate'); break; 
			case 74: $result = $row->get('a_day'); break; 
			*/
			case 75: $result = $this->months[$row->get('a_month')]; break; 
			case 76: $result = $row->get('a_year'); break; 
			case 77: $result = $this->weekdays[$row->get('a_weekday')]; break; 
			
			case 111: $result = $communities[0]->get('community'); break; 
			case 112: $result = $communities[0]->getDepartment(); break; 
			case 113: $result = $communities[0]->getFaculty(); break;
			case 114: $result = $communities[0]->getProgram(); break;
			case 115: $result = $communities[0]->get('class_year'); break;
			
			default: $result = parent::getGroupStr($order_by, $row);
		}		
		
		return $result;
	}				
}
