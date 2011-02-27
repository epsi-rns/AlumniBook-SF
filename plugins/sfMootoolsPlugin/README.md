Symfony-MooTools-Plugin
=======================

This plugin loads [MooTools](http://mootools.net/) 1.3
for use with Symfony 1.4.

How to use
----------

Please publish your asset after installing this plugin.

	$ symfony plugin:publish-assets


Then you can configure by using either view.yml or filters.yml.
Different site may have different requirements,
so pick whatever suit your needs.

### view.yml

Very simple quick fix, as usual.

	default:
	  javascripts:
	    - /sfMootoolsPlugin/js/mootools-core-1.3-full-nocompat-yc.js
	    - /sfMootoolsPlugin/js/mootools-more-1.3-yc.

You might want to use external link without even usin this plugin.

	default:
	  javascripts:
	    - http://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js

### filters.yml

Use this filter.yml to load mootools application wide.

	# insert your own filters here
	mootools:
	  class: mootoolsFilter

This filter will read configuration in app.yml.
With this method, any dependent plugin may detect
if mootools plugin already activated.
  
License
-------

[MIT License](http://www.opensource.org/licenses/mit-license.php)
