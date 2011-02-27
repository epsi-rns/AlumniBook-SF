<?php
	$module = $sf_request->getParameter('module');	
	$allowed = array('alumni', 'org', 'acommunities');

	$action = $sf_request->getParameter('action');	
	$disallowed = array('list', 'show', 'new', 'edit');
	
	if (! in_array($action, $disallowed) 
	&&  in_array($module, $allowed) )
	{
		use_helper('sfMooSideBarMenu'); 
		plgContentSideBarMenuActivate();
		plgContentSideBarMenu(array(
			'id_pagetop' => 'top',
			'id_pagebottom' => 'bottom',
			'route_tweets' => 'cover/devnews'
		));
	}
