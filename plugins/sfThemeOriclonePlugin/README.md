Oriclone Theme
==============

My personal theme, the original clone.
Although I've made it from scratch, it is inspired by other design.
This theme is for Symfony 1.4, and soft dependency with mootools 1.3.

Feature
-------

*	Some theme effects.
	Require mootools 1.3, but you can turn it off.
*	Layout testing CSS
*	Symfony layout:  layout, error404 and modal.
*	CSS compressor task class
*	Custom 404 error page.
*	Control parameter via app.yml
*	A few source images (XCF's GIMP), only small files.


About
-----	

Don't mind the looks, I'm not a designer.
You are free to use or modify this template in your site

You may want to take a look at the source code 
and adapt oriclone to your own template.

Here in this template, you might find challenging techniques.

This template is designed from scratch. 
Although it is inspired by other template like *MittWoch*'s side menu,
it is actually original. 

Add Blocks
----------

You can add blocks easily with app.yml.
You can also modifydefault configuration for sitename and logo class.

    //	apps/frontend/config/app.yml

    all:
      oriclone:
        layout:  
          sitename: AlumniBook
          logo:     logo-orikara
          blocks:
            left: common/block_menu
            top:  common/block_top

Modify CSS
----------

You can change this theme to suits your needs.
e.g. disable mootools effects, or turn off css debug.
Turning of css debug will change your css from style.css to import.css.

Just modify and add these line in your frontend app.yml.

    //	apps/frontend/config/app.yml

    all:
      oriclone:
        layout:
          # optional
          debug_css: true
          effects:   false  

When you are done with your modification,
turn off debug_css and do CSS compressor task:

    php symfony oriclone:compress-css

Source Images
-------------

I had cloned any necessary images using GIMP.
Shareable GIMP source also available.
Small XCF files included here,
while I keep most XCF at home to keep the theme small.
Just mail me if you need.

Please consider it as learning purpose and personal only.
The GIMP source in XCF is *shareable*.
That means you can add more customizable variation of color and style.
		
Have fun!		


History
-------

This oriclone Theme for Symfony is a port for 
previous Oriclone Theme for Joomla and Oriclone theme for BuddyPress.

The original contain many mootools effects and more stylesheets.



Catatan untuk pengguna Indonesia
--------------------------------

Dilarang keras:
	
	Menggunakan template ini secara liar 
	dengan tujuan untuk mengatasnamakan iluni
	ataupun mengkaitkan situs dengan Universitas Indonesia
	tanpa ijin tertulis ketua iluni atau wakil ketua ex-officio.

Selain itu bebas.

How to use
----------

Configuration done via your app.yml.

    //	apps/frontend/config/app.yml
    
      oriclone:
        layout:  
          sitename: AlumniBook
          logo:     logo-orikara
          blocks:
            # try to change to right
            left: common/block_menu
            top:  common/block_top
            index_bottom: common/block_login_guidance
            main_bottom:  common/block_moo_sidebar_menu

Blocks refer to templates for se with include_partial.

All you need to do is create layout in application templates.

    //	apps/frontend/templates/layout.php
    
    include_partial('sfThemeOriclone/layout',
    	array('sf_content' => $sf_content) );

License
-------

[MIT License](http://www.opensource.org/licenses/mit-license.php)
