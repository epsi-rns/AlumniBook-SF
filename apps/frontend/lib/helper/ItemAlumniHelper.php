<?php 
	include('ItemBaseHelper.php');

class item_alumni extends item_base {

	// need a simple name ref...!!
	public function showOrgMapInAlumna (&$map, &$k)
	{
		$text = $map->getOrganization()->getFullname();
		$link = 'org/detail?org_id='.$map->getOrgId();
		echo link_to($text, $link);
	}

	public function showCompy (&$rows, &$k) 
	{
		$same_competency = __('Browse alumni with same competency');
		foreach ($rows as $compy) 
		{ 
			$decription = $compy->getDescription();
			$desc = empty($decription) ? "" : " (".$decription.")";
			$text = $compy->getCompetency();
			$link = 'acompetencies/filter?id='.$compy->getCompetencyId();
			$ref = "\t\t".link_to($text, $link).$desc."\n";
			$this->showRowValue($ref, $k, __('Competency'),$same_competency);
		}
	}
	
	public function showCerti (&$rows, &$k) 
	{
		foreach ($rows as $certi) 
		{ 
			$inst = $certi->getInstitution();
			$text = "\t\t".$certi->getCertification().(empty($inst) ? "" : " (".$inst.")")."\n";
			$this->showRowValue($text, $k, __('Certification'));	  
		}
	}

	public function showExperiences (&$experiences, &$k)	
	{ 
		if ($experiences ->count()) 
		{
			$exp_arr = array();
			foreach ($experiences as $exp) 
				$exp_arr[] = "<li>".$exp->getOrganization()."</li>";
			$text = "\t\t<ul>".implode("\n", $exp_arr)."</ul>\n";
		
			$this->showRowValue($text, $k, __('Experiences'));	
		}
	}
	
	public function showGender (&$one, &$k) 
	{
		$gender = $one->getGender();
		if (!empty($gender)) 
		{ $this->showChkRowValue (__($one->getGenderText()), $k, __('Gender')); }
	}

	public function showBirth (&$one, &$k) 
	{
		$birthPlace	= $one->getBirthPlace();
		$birthDate	= $one->getBirthDate();
	    if (!empty($birthPlace))	$items[] = $birthPlace;
	    if (!empty($birthDate))	$items[] = date('l, jS \of F Y',strtotime ($birthDate) ); // $this->getTanggal($one);
	    $text = (empty($items)) ? "" : implode(',<br/>', $items);
	    $this->showChkRowValue ($text, $k, __('Birth Place/ Date')); 
	}

	private function getTanggal (&$one) { 
	  $arrBulan = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 
		5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
                9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");

	  $arrHari = array(1 => "Senin", 2 => "Selasa", 3 => "Rabu", 4 => "Kamis",
		5 => "Jumat", 6 => "Sabtu", 0 => "Minggu");  // ISO 8601, Firebird, not mysql

	  return $arrHari[$one->HARI].", ".$one->TANGGAL
		." ".$arrBulan[$one->BULAN]." ".$one->TAHUN;
	}
} // end of class

?>
