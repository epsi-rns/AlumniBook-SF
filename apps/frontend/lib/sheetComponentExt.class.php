<?php

/**
 * extended sheet components contain project specific methods
 *
 * @package    alumni
 * @subpackage sheet extended
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class sheetComponentsExt extends sheetComponents
{
	protected 
		$editor = false,
		$now = null;
	
	public function executeShow()
	{
		$this->now = time();
		$this->attr = array('class' => 'icon_edit');		
		$this->attr_show = array('class' => 'icon_show');
				
		$sf_user = $this->getUser();
		$this->editor = ($sf_user->hasCredential('editor')); 
		
		return parent::executeShow();
	}	

	protected function th_action()
	{
		return ($this->editor)? $this->th('Action') : $this;	
	}		
	
	protected function td_action($str)
	{
		return ($this->editor)? $this->td($str, 'width="8%"') : $this;	
	}	

	// For use with $order_by_choices in *FormFilter.class.php
	// put here for simplicity, but instead of here
	// it could be placed in descendant class for more complex project
	public function getGroupStr($order_by, $row) 
	{ 
		if (in_array($order_by, array(101, 102, 103, 104, 105)))
			$communities = $row->getAlumni()->getACommunities();

		if (in_array($order_by, array(111, 112, 113, 114, 115)))
			$communities = $row->getACommunities();
			
		switch ($order_by) 
		{
			/* Never ever group any ID's!
			case 1: $result = $row->get('aid'); break;
			case 2: $result = $row->get('cid'); break;
			case 3: $result = $row->get('org_id'); break;
			case 4: $result = $row->get('mid'); break;
			case 5: $result = $row->get('did'); break;
			case 6: $result = $row->get('lid'); break;
			*/ 
			
			/* Not grouping either
			case 10: Any total count
			case 11: $result = $row->get('created_at'); break;
			case 12: $result = $row->get('update_at'); break;
			*/
			
			case 21: $result = strtoupper(substr($row->getAlumni(), 0, 1)); break; 			
			case 23: $result = strtoupper(substr($row->getOrganization(), 0, 1)); break; 
			case 24: $result = strtoupper(substr($row->getName(), 0, 1)); break; // Alumna/us
			case 25: $result = strtoupper(substr($row->getName(), 0, 1)); break; // Organization
			case 26: $result = strtoupper(substr($row->getAOMap()->getAlumni(), 0, 1)); break; // Alumna/us
			case 27: $result = strtoupper(substr($row->getAOMap()->getOrganization(), 0, 1)); break; // Organization
			
			/* Not grouping either
			case 30: $result = $row->get('product'); break;
			*/			
			
			/* Not grouping either
			case 41: $result = $row->get('certification'); break; 
			case 42: $result = $row->get('institution'); break;
			case 44: $result = $row->get('organization'); break;
			*/
			case 45: $result = $row->getCompetency(); break;
			case 46: $result = $row->getBizField(); break;
			case 47: $result = $row->getContactType(); break;
			
			/* Not grouping either
			case 60: $result = $row->get('address'); break; 
			case 61: $result = $row->get('region'); break; 
			*/
			case 63: $result = $row->getCountry(); break; 
			case 64: $result = $row->getProvince(); break; 
			case 65: $result = $row->getDistrict(); break;
			
			
			/* Not grouping either
			case 66: $result = $row->get('postal_code'); break; 
			case 67: $result = $row->get('street'); break; 
			case 68: $result = $row->get('area'); break; 
			case 69: $result = $row->get('building'); break;
			*/ 
			
			// case 73..77 in alumni descendant
			case 71: $result = $row->get('gender'); break; 

			case 81: $result = $row->get('community'); break; 
			case 82: $result = $row->getDepartment(); break; 
			case 83: $result = $row->getFaculty(); break; 
			case 84: $result = $row->getProgram(); break; 
			case 85: $result = $row->get('class_year'); break;
			
			case 91: $result = $row->get('source'); break;						

			case 101: $result = $communities[0]->get('community'); break; 
			case 102: $result = $communities[0]->getDepartment(); break; 
			case 103: $result = $communities[0]->getFaculty(); break;
			case 104: $result = $communities[0]->getProgram(); break;
			case 105: $result = $communities[0]->get('class_year'); break;			

			// case 112..115 in alumni descendant

			default: $result ='';
		}

		return $result;
	}
	
	// miscellanous helper
	protected function textShort($string,$length=35,$end='...')
	{
		if (mb_strlen($string) > $length)		
			$string = mb_substr($string, 0, $length).$end;		
		return $string;
	}	
	
	protected function PastDateImg ($date) 
	{
		$pastdate = round ( ($this->now - strtotime($date)) /  86400 );
		if (($pastdate-15) < 0) {$img='new1.png';}
		elseif (($pastdate-40) < 0) {$img='new2.png';}
		elseif (($pastdate-100) < 0) {$img='new3.png';}

		return isset($img) ? '&nbsp;<img src="/images/silk/'.$img.'" border="0"/>' : ""; 
	}
	
	protected function salute($row) 
	{
	  $gender =	$row->get('gender');
	  
	  switch ($gender) {
	    case 'M': $salute = __('Mr.'); break;
	    case 'F': $salute = __('Ms.'); break;
	    default: $salute = 'Alumna/us';
	  }
	  
	  // possible bug with zero date validation ignored
	  $birthdate = $row->get('birthdate');
	  if (!empty($birthdate)) 
	  {
	    $today = getdate();
	    $birthyear = date('Y', strtotime($birthdate));
	    $diffyear = $today['year'] - $birthyear;

	    if (($diffyear>15) && ($diffyear<35)) {
	      switch ($gender) {
			case 'M': $salute = __('Brother'); break;
			case 'F': $salute = __('Sister'); break;
	      }
	    } // diffyear
	  }  
	  return $salute;
	}  // function	
}
