<?php
	$module = $sf_request->getParameter('module');

	// tuples
	$tabs = array(
		'alumni'			=> array(__('Alumni'), 'alumni/show?aid='.$aid),
		'acommunities'		=> array(__('Communities'), 'acommunities/list?aid='.$aid),
		'amap'				=> array(__('Map'), 'amap/list?aid='.$aid),
		'residence'			=> array(__('Home/ Residence'), 'residence/list?aid='.$aid),
		'acontacts'			=> array(__('Personal Contacts'), 'acontacts/list?aid='.$aid),
		'adegrees'			=> array(__('Academic Degrees'), 'adegrees/list?aid='.$aid),
		'aexperiences'		=> array(__('Experiences'), 'aexperiences/list?aid='.$aid),
		'acompetencies'		=> array(__('Competencies'), 'acompetencies/list?aid='.$aid),
		'acertifications'	=> array(__('Certifications'), 'acertifications/list?aid='.$aid)
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
