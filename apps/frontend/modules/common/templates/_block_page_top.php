
	<p class="accessibility">
	This website was created to reach every audience possible.</p>
	
<?php	
	$module = $sf_request->getParameter('module');	
	$allowed = array('cover');

	$action = $sf_request->getParameter('action');	
	$disallowed = array();
	
	if (! in_array($action, $disallowed) 
	&&  in_array($module, $allowed) )
	{
		$img_nm = '/sfThemeOriclonePlugin/images/notmine';
	?>
<script type="text/javascript">
	window.addEvent('domready', function() {
		mootools_peel_effect();
	});
</script>
<div id="page-flip" class="no-print">
	<?php echo link_to(
		image_tag( $img_nm.'/page_flip.png', array(
			'alt' => 'Subscribe!', 'id' => 'page-flip-image'
		)),
		'main/feed.atom'); ?>
	<div id="page-flip-message"></div>
</div>	
	<?php }
?>
