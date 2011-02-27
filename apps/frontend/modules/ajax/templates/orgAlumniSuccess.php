<?php
	use_helper('ItemOrg'); 
	$item = new item_org();
	$k=1;	
?>
<strong><?php	$item->showAlumnaMapInOrg($map, $k);  ?></strong>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
<?php	
	$item->showMapDetail($map, $k); 
	$item->showCommunity($communities, $k);
	$item->showAddress($residences, $k, __('Residence')); 
	$item->showContact($acontacts, $k); 
?>
</table>
