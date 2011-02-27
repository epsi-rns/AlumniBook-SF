Symfony-MooTools-TwitterGitter-Wrapper-Plugin
=============================================

This sfMooTwitterGitterPlugin is for Symfony 1.4 and Mootools 1.3.
This plugin is a wrapper for [David Walsh's Twitter Gitter](http://davidwalsh.name/david-walsh-twitter).

How to use
----------

Pick one of four available parameters.

*	username: one username, produce one tweet
*	usernames: many usernames, produce many tweets
*	random: many usernames, produce one random tweet
*	randoms: many usernames, produce many 5x5 tweets

The code in your template would look like:

	//	apps/frontend/modules/cover/templates/devnewsSuccess.php

	use_helper('sfMooTwitterGitter'); 
	plgContentTwitterGitterActivate();
	plgContentTwitterGitter(array(
		'randoms' => 'mootools, processingjs, dojo, commonjs, clientcide, '
			.'symfony, symfony2, doctrineorm, zend, pear, pimcore, '
			.'CodeIgniter, cakephp, agavi, solarphp, yiiframework, '
			.'djangocms, plone, '
			.'drupal, joomla, moodle, magento, silverstripe, '
			.'alirocms, ImpressCMS, typo3, modxcms, wordpress, '
			.'rails, merbivore, radiantcms, diem_project, phpmya, '
			.'firebirdsql, postgresql, mysql, mongodb, CouchDB, '
			.'debian, openbsd, freebsd, '
			.'gnome, calligrasuite, gnomeshell, kdecommunity'
			.'OpenERP, quippdPython, ThePSF, perlbuzz, LazarusDev, '
			.'github, bitbucket, kambing, '
			.'nurwijayadi, fabpot, dries, gvanrossum'
	));
	
License
-------

The TwitterGitter Javascript class is belong to David Walsh.

For the plugin itself:
[MIT License](http://www.opensource.org/licenses/mit-license.php)

