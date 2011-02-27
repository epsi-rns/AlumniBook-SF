<?php 
	// soft dependency
	use_helper('sfMooDiaBox'); 
	plgContentDiaBoxActivate();

	use_helper('sfMooNoobSlide'); 
	plgContentNoobSlideActivate();
	plgContentNoobSlide(array(
		'title' => 'AlumniBook Screenshot',
		'subtitle' => 'Any related AlumniBook ports.',
		'lightbox_type' => 3,	// use diabox
		// picasa mode	
		'picasa_user'	=> 'epsi.rns',
		'picasa_album'	=> 'AlumniBook'
	));
