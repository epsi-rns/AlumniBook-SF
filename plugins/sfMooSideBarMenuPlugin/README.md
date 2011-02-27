Symfony-MooTools-SideBarMenu-Wrapper-Plugin
===========================================

This sfSideBarMenuPlugin plugin is for Symfony 1.4 and Mootools 1.3.
This plugin is a wrapper for [David Walsh's Scroll Sidebar](http://davidwalsh.name/scroll-sidebar).

How to use
----------

Your code in your template would look like:

	use_helper('sfMooSideBarMenu'); 
	plgContentSideBarMenuActivate();
	plgContentSideBarMenu(array(
		'id_pagetop' => 'top',
		'id_pagebottom' => 'bottom',
		'route_tweets' => 'cover/devnews'
	));

License
-------

The ScrollSideBar Javascript class is belong to David Walsh.

For the plugin itself:
[MIT License](http://www.opensource.org/licenses/mit-license.php)
