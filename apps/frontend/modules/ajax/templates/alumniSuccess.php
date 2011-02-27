<?php
	use_helper('ItemAlumni'); 
	$item = new item_alumni();
	$k=1;

	$item->showCommunity($communities, $k); 
	$item->showGender($one, $k); 
	$item->showBirth($one, $k); 
	// deprecated: $item->showTitle($one, $k); 
	$item->showCompy($competencies, $k); 
	$item->showCerti($certifications, $k); 
	$item->showExperiences($experiences, $k);
	$item->showAddress($residences, $k, __('Residence')); 
	$item->showContact($acontacts, $k); 
