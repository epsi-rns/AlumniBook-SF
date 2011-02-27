<?php

/**
 * @package    sfMooSideBarMenuHelper
 * @subpackage helper
 * @author     E.R. Nurwijayadi
 * @version    1.0
 * 
 */
 
function plgContentSideBarMenuActivate() 
{
	$path = '/sfMooSideBarMenuPlugin';
	use_javascript($path.'/js/mooclass.sidebar.js');
	use_stylesheet($path.'/css/sidebar.css');
}

function plgContentSideBarMenu($params)
{		
	include_partial('sfMooSideBarMenu/default',
		array('params' => $params));
}
