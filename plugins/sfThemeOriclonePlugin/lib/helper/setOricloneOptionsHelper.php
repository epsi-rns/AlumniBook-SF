<?php

function setOricloneStyleSheets( $css_s )
{
	extract( $css_s );
	$path_css = '/sfThemeOriclonePlugin/css/';

	if	(isset($text_scheme))
		use_stylesheet($path_css.'scheme/'.$text_scheme.'.css');
			
	if	(isset($strip_normal))
		use_stylesheet($path_css.'strip/'.$strip_normal.'.css');	
			
	if	(isset($strip_hover))
		use_stylesheet($path_css.'hover/'.$strip_hover.'.css');	
			
	if	(isset($marble))
		use_stylesheet($path_css.'marble/'.$marble.'.css');	
}

function getOricloneStyleClasses($class_s)
{
	extract($class_s);
	
	$class=array();

	if	(isset($width_style))
		$class[] = 'width_'	.$width_style;	

	if	(isset($background_main))
		$class[] = 'mbg_'	.$background_main;

	if	(isset($background_header))
		$class[] = 'hbg_'	.$background_header;

	if	(isset($variation_top))
		$class[] = $variation_top;
	
	return implode(' ', $class);
}	

function initOricloneAssetsLayout($debug_css, $effects)
{
	$path = '/sfThemeOriclonePlugin';

	if	($effects)
		use_javascript($path.'/js/effects.js');
		
	if	($debug_css)		
		use_stylesheet($path.'/css/import.css');
	else	
		use_stylesheet($path.'/css/style.css');
}

function initOricloneAssetsError($debug_css, $effects)
{
	$path = '/sfThemeOriclonePlugin';

	if	($effects)
	{
		use_javascript($path.'/js/effects.js');
		use_javascript($path.'/js/Fx.Shake.js');
	}	
		
	if	($debug_css)		
		use_stylesheet($path.'/css/import.css');
	else	
		use_stylesheet($path.'/css/style.css');	

	use_stylesheet($path.'/css/error.css');	
}
