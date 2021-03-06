AlumniBook on Symfony
=====================

This is my first symfony application.
For learning purpose so others may have sample
and speed up their development process.

## Goal

*	Simple questionnaire-based data-entry, rewritten on Symfony.
*	Learn, share, and get rid of legacy version.


Related Link
------------

This rewrite version:

*	The source code at github
	[AlumniBook on Symfony](https://github.com/epsi/AlumniBook-SF)
*	Demo site in [book.iluni.org](http://book.iluni.org)
	This site and any preloaded data is only a demonstration of its capability.
	It is not intended for real data entry process.
*	Screenshot at [picasaweb.google.com/epsi.rns](https://picasaweb.google.com/epsi.rns/AlumniBook#)

The original legacy version:

*	[AlumniBook on CodeIgniter](https://github.com/epsi/AlumniBook-CI)
*	[AlumniBook on Delphi](https://github.com/epsi/AlumniBook-D7)

Wiki

*	[Home](https://github.com/epsi/AlumniBook-SF/wiki)
*	[Feature Plan](https://github.com/epsi/AlumniBook-SF/wiki/Feature-Plan)
*	[ILUNI](https://github.com/epsi/AlumniBook-SF/wiki/ILUNI)


Feature
-------

*	Included many good things from Jobeet documentation from
	[Practical Symfony Book](http://www.symfony-project.org/jobeet/1_4/Doctrine/en/).
	I also skipped many other good parts.
	Log of this work in step-by-step.txt.
*	Simple routing class for master-detail table relationship.
*	Base component to render table sheet report
	with header, footer and grouping feature.
*	Different layouts: layout, error404, ajax, and modal.
*	Mootools integration:
	* ajax request, 
	  now we have mootools-symfony-ajax combination (but not integration).
	* form field validation
	* theme effects
	* sfWidgetFormDatePicker
	* dynamic drop down list using ajax (master-detail)
	* Using a special iframe lightbox for value lookup.
	  This input also utilize a lookup modal widget.
*	Oriclone Theme:
	My personal theme, the original clone.
	Although I've made it from scratch, it is inspired by other design.
	* CSS compressor task class
	* Custom 404 error page.
	* Controll parameter via app.yml
	* A few source images (XCF's GIMP), only small files.
*	Few plugins: each has their own README.md, most are only mootools wrapper.
*	Also utilize I18n translation in form filter.


Screenshot
----------

*	[Table of contents in multi language](https://picasaweb.google.com/epsi.rns/AlumniBook#5578354736029962338)
*	[Backend for administrator](https://picasaweb.google.com/epsi.rns/AlumniBook#5578354763983509922)
*	[General sheet](https://picasaweb.google.com/epsi.rns/AlumniBook#5578354816024650978)
*	[Alumni detail with AJAX](https://picasaweb.google.com/epsi.rns/AlumniBook#5578355526800334082)
*	[Validation before submit](https://picasaweb.google.com/epsi.rns/AlumniBook#5578360327113373458)
*	[Show with related tabs menu](https://picasaweb.google.com/epsi.rns/AlumniBook#5578355602314296898)
*	[List for master detail table](https://picasaweb.google.com/epsi.rns/AlumniBook#5578355513394329666)
*	[Map relation of person and company](https://picasaweb.google.com/epsi.rns/AlumniBook#5578355686298380562)
*	[Modal box for lookup](https://picasaweb.google.com/epsi.rns/AlumniBook#5578360380680365346)
*	[Custom 404 error page](https://picasaweb.google.com/epsi.rns/AlumniBook#5578356441184900050)
*	[Module item lime test](https://picasaweb.google.com/epsi.rns/AlumniBook#5582497997088174482)
*	[All functional lime test](https://picasaweb.google.com/epsi.rns/AlumniBook#5582498018623503426)

Private Plugins
---------------

Each plugins has its own readmes:

*	[sfThemeOriclonePlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfThemeOriclonePlugin)
*	[sfMootoolsPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMootoolsPlugin)
*	[sfMooDatePickerPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMooDatePickerPlugin)
*	[sfMooDiaBoxPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMooDiaBoxPlugin)
*	[sfMooNoobSlidePlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMooNoobSlidePlugin)
*	[sfMooSideBarMenuPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMooSideBarMenuPlugin)
*	[sfMooTwitterGitterPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfMooTwitterGitterPlugin)
*	[sfFormInputLookupModalPlugin](https://github.com/epsi/AlumniBook-SF/tree/master/plugins/sfFormInputLookupModalPlugin)



Install
-------
*	Install symfony 1.4.8 via pear or put it in lib/vendor

*	Download AlumniBook at https://github.com/epsi/AlumniBook-SF.
	then extract in your project directory. 
	
*	Configuration:

	Check relative path to the symfony core autoloader

		// config/ProjectConfiguration.class.php
		'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php'
	
	Check database connection, username and password

		// config/database.yml
		  dsn: 'mysql:host=localhost;dbname=alumni'
			
*	Publish plugin assets

		$ symfony plugin:publish-assets
		$ symfony cc
	
*	Load sample data
	
		$ symfony doctrine:build --all --and-load --no-confirmation

*	Configure Apache: Browse to http://alumni/ .
	You can find sample in apache-alumni.txt in this package
	for use in sites-available directory.
	Don't forget to make it available by running a2ensite in terminal.	


License
-------

This work is licensed under
[MIT License](http://www.opensource.org/licenses/mit-license.php).

The Symfony Framework is licensed under MIT License.

Mootools Javascript is licensed under MIT License.

However some works may apply different license,
so I would like to list each to appreciate them.

*	Icons: [Silk Icons](http://www.famfamfam.com/lab/icons/silk/)
	licensed under a Creative Commons Attribution 2.5 License.
*	Images: [OpenClipArt](http://openclipart.org)
	licensed under a CC0 1.0 Universal (CC0 1.0) Public Domain Dedication.
*	[Mootools Javascript Framework](http://mootools.net)
	also licensed under MIT-style license.
*	Mootools-Datepicker by Arian Stolwijk (see sfMooDatePickerPlugin),
	Mootools-NoobSlide by luistar15, 
	Mootools-Reflection by Christophe Beyls and
	Mootools-Diabox by Mike Nelson 
	licensed under MIT license.
*	Mootools Effects: I also grab many smart sample from
	[David Walsh](http://davidwalsh.name),
	and modify those goodies for use with my oriclone themes.
	It is considered as knowledge for public, not license.
*	The glossy orb logo provided contain Makara logo inside.
	The Makara logo itself belong to University of Indonesia.
	You may preferred to use your own logo.
