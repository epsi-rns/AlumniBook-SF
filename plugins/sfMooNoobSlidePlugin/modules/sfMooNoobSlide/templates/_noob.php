<?php if($adapter):
	$request = sfContext::getInstance()->getRequest();
	$host  = $request->isSecure()? 'https://':'http://';
	$host .= $request->getHost() . $request->getRelativeUrlRoot();
endif; ?>
<script type="text/javascript">
window.addEvent('domready',function(){
	var spinner = document.id('noob_cont').getElement('.noob_info');
	spinner.spin();
		
	myNoobSlide = function(images) {
		spinner.unspin();
		if (images.length>0) {				
			new mooNoobSlideHelper({
				<?php switch($lightbox_type) {	
					case 1: echo 'slimbox: true,'; break;
					case 2: echo 'mediaboxAdv: true,'; break;
					case 3: echo 'diabox: true,'; break;
				} 
					
				if(!$adapter): ?>
				path: (typeof noobPrefix)=='undefined'? '' 
					: '<?php echo $host;?>' + noobPrefix,
				<?php endif; ?>	
				items: images
			});
		}
	}		
	
<?php if(!$adapter): ?>
	myNoobSlide(noobImages);
<?php else: ?>	
	new mooGooglePicasaWeb({
		user: '<?php echo $picasa_user; ?>',
		album: '<?php echo $picasa_album; ?>',
		onComplete: myNoobSlide
	}).send();
<?php endif; ?>	
});
</script>

<div id="noob_cont">

<div class="noob_sample">

	<div class="noob_thumbs" id="noob_thumbs_left">
		<div class="noob_nav_mask" id="noob_handles_1">
		<div class="noob_nav_box" id="noob_lnav_box">
		</div>
		</div>
	
		<div class="noob_nav_buttons">
			<span id="noob_lnav_prev"><?php echo image_tag($images.'go-up.png') ?></span>
			<span id="noob_lnav_next"><?php echo image_tag($images.'go-down.png') ?></span>
		</div>		
	</div>

	<div class="noob_thumbs" id="noob_thumbs_right">
		<div class="noob_nav_mask" id="noob_handles_2">
		<div class="noob_nav_box" id="noob_rnav_box">
		</div>
		</div>
	
		<div class="noob_nav_buttons">
			<span id="noob_rnav_prev"><?php echo image_tag($images.'go-up.png') ?></span>
			<span id="noob_rnav_next"><?php echo image_tag($images.'go-down.png') ?></span>
		</div>		
	</div>
	
	<div class="noob_mask">
		<div id="noob_main_box" title="click to zoom"></div>
		<div class="noob_info">
			<h4><?php echo $title; ?>
			<?php if($adapter==0): ?>			 
			<a href="<?php echo $picasa_link; ?>" target="_blank">Link</a>
			<?php endif; ?></h4>
			<p><?php echo $subtitle; ?></p>
		</div>
	</div>	
	
	<p class="noob_buttons">
		<span id="noob_prev">Previous</span>
		<span id="noob_playback">Playback</span>
		<span id="noob_stop">Stop</span>
		<span id="noob_play">Play</span>
		<span id="noob_next">Next</span>
	</p>
</div>
	
<div style="clear:both;"></div>
</div>	
