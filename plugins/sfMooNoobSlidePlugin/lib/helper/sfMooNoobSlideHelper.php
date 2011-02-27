<?php

/**
 * @package    sfMooNoobSlideHelper
 * @subpackage helper
 * @author     E.R. Nurwijayadi
 * @version    1.0
 * 
 */
 
function plgContentNoobSlideActivate() 
{
  $path = '/sfMooNoobSlidePlugin';
  
  use_javascript($path.'/js/mooclass.reflection.js');
  use_javascript($path.'/js/mooclass.gpw.js');
  use_javascript($path.'/js/mooclass.noobSlide.js');
  use_javascript($path.'/js/moohelper.noob.js');  
  
  use_stylesheet($path.'/css/noob.css');
}

function plgContentNoobSlide($params)
{
	$lightbox_type = isset($params['lightbox_type'])? $params['lightbox_type'] : 0;
	
	// picasa mode	
	$picasa_link	= 'http://picasaweb.google.com/'
		.$params['picasa_user'].'/'.$params['picasa_album'];
	$adapter = (int)(empty($picasa_user) || empty($picasa_album));
	
	// otherwise file mode	
	// ..not implemented here
		
	include_partial('sfMooNoobSlide/noob', array(
		'images' => '/sfMooNoobSlidePlugin/images/',
		'lightbox_type' => $lightbox_type,
		'picasa_user' => $params['picasa_user'],
		'picasa_album' => $params['picasa_album'],
		'picasa_link' => $picasa_link,
		'adapter' => $adapter,
		'title' => $params['title'],
		'subtitle' => $params['subtitle']
	));
}
