<?php
	use_helper('ItemAlumni'); 
	$item = new item_alumni();
	$k=1;
	
?>
<strong><?php	$item->showOrgMapInAlumna($map, $k);  ?></strong>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
<?php	
	$item->showMapDetail($map, $k); 
	$item->showAddress($offices, $k, 'Office'); 
	$item->showContact($ocontacts, $k); 
	$item->showAddress($workplaces, $k, __('Workplace'));
	$item->showContact($mcontacts, $k); 
?>
</table>
