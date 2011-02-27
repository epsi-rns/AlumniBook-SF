<?php
	$module = $sf_request->getParameter('module');

	// tuples
	$tabs = array(
		'alumni'	=> array(__('Alumni'), 'alumni/show?aid='.$aid),	
		'org'		=> array(__('Organization'), 'org/show?org_id='.$org_id),
		'amap'		=> array(__('Occupation'), 'amap/list?aid='.$aid),		
		'omap'		=> array(__('Job Position'), 'omap/list?oid='.$org_id),
		'workplace'	=> array(__('Workplaces'), 'workplace/list?mid='.$mid),
		'mcontacts'	=> array(__('Contacts'), 'mcontacts/list?mid='.$mid),
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
