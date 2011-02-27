Symfony-MooTools-NoobSlide-Wrapper-Plugin
=========================================

This sfMooNoobSlidePlugin is for Symfony 1.4 and Mootools 1.3
This plugin is a wrapper for [MooTools noobSlide](http://www.efectorelativo.net/laboratory/noobSlide/).

How to use
----------

There is two mode used in this plugin:

*	picasa album and
*	javascript files that hold photo array. 
    sample javascript included in /media/user/js/

For each mode you can put title and subtitle.
Here is sample for picasa mode in template:

	use_helper('sfMooNoobSlide'); 
	plgContentNoobSlideActivate();
	plgContentNoobSlide(array(
		'title' => 'AlumniBook Screenshot',
		'subtitle' => 'Any related AlumniBook ports.',
		'lightbox_type' => 3,		
		// picasa mode	
		'picasa_user'	=> 'epsi.rns',
		'picasa_album'	=> 'AlumniBook'
	));
	
You might want to choose lightbox from plugin parameter.

1.	Slimbox
2.	Mediabox Advance
3.	Diabox

This lightbox plugin come as external plugin with no dependencies.
Don't forget to manually activate lightbox plugin in template before activating noobslide.

	use_helper('sfMooDiaBox'); 
	plgContentDiaBoxActivate();
	
License
-------

[MIT License](http://www.opensource.org/licenses/mit-license.php)	
