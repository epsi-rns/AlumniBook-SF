<?php
	$module = $sf_request->getParameter('module');

	// tuples
	$tabs = array(
		'org'		=> array(__('Organization'), 'org/show?org_id='.$org_id),
		'omap'		=> array(__('Map'), 'omap/list?oid='.$org_id),
		'office'	=> array(__('Offices'), 'office/list?oid='.$org_id),
		'ocontacts'	=> array(__('Contacts'), 'ocontacts/list?oid='.$org_id),
		'ofields'	=> array(__('Business Fields'), 'ofields/list?oid='.$org_id),
	);
?>

<div class="menu_tabs" title="Related Attributes">
<ul>
<?php 
	foreach($tabs as $key => $tab)
	{
		$class = ($module == $key)? ' class="selected"' : '';
		list($text, $route) = $tab;
		echo "\t".'<li'.$class.'>'.link_to($text, $route).'</li>'."\n";		
	}
?>
</ul>
</div>
