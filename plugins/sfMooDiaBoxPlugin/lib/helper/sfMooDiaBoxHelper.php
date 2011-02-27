<?php

/**
 * @package    sfMooDiaBoxHelper
 * @subpackage helper
 * @author     E.R. Nurwijayadi
 * @version    1.0
 * 
 */
 
function plgContentDiaBoxActivate() 
{
	$path = '/sfMooDiaBoxPlugin';
	use_javascript($path.'/js/diabox.min.js');
	use_stylesheet($path.'/css/diabox.css');
	
	echo '
	<script type="text/javascript" charset="utf-8">
		window.addEvent("domready", function(){
			window.diabox = new Diabox();
 		});
	</script>
';
}

function plgContentDiaBoxFrameActivate($on_dom_ready = true) 
{
	$path = '/sfMooDiaBoxPlugin';
	use_javascript($path.'/js/diabox.min.js');
	use_stylesheet($path.'/css/diabox.css');
	
	if ($on_dom_ready)	echo '
	<script type="text/javascript" charset="utf-8">
		window.addEvent("domready", function(){
			window.diabox = new Diabox({
				iframe : {width : 640, height: 400}
			});
 		});
 		
		// no ajax;
		Diabox.AjaxRenderable = new Class({
			Extends : Diabox.RemoteRenderable
		}); 		
	</script>
';
}

