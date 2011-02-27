<?php

/**
 * @package    sfMooTwitterGitterHelper
 * @subpackage helper
 * @author     E.R. Nurwijayadi
 * @version    1.0
 * 
 */
 
function plgContentTwitterGitterActivate() 
{
	$path = '/sfMooTwitterGitterPlugin';
	use_javascript($path.'/js/moohelper.tweeter.js');
	use_stylesheet($path.'/css/tweeter.css');
}

function plgContentTwitterGitter($params)
{		
	include_partial('sfMooTwitterGitter/default',
		array('params' => $params));
}
