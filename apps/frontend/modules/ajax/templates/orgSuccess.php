<?php
	use_helper('ItemOrg'); 
	$item = new item_org();
	$k=1;

	$item->showProduct($one, $k); 
	$item->showField($fields, $k); 
	$item->showParent($one, $k);
	$item->showBranch($one, $k);  
	$item->showAddress($offices, $k, __('Office'));
	$item->showContact($ocontacts, $k);
