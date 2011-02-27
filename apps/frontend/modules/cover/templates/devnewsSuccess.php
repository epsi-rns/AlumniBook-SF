<?php 
	slot('title', 'Random Twitter for Web Developer');

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
