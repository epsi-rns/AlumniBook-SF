Symfony-MooTools-DatePicker-Wrapper-Plugin
==========================================

This sfMooDatePickerPlugin is for Symfony 1.4 and Mootools 1.3.
This plugin is a wrapper for [MooTools DatePicker](https://github.com/arian/mootools-datepicker/).

How to use
----------

You need to configure your form/ filter:

	public function configure()
	{
		...
	
		$this->widgetSchema['update_st'] = new sfWidgetFormDatePicker(
			array('theme'=>'dashboard'));
		$this->widgetSchema['update_st']->setLabel('Update (start) Range');
		$this->validatorSchema['update_st'] = new sfValidatorPass(); 
    
		...
	}
  
### Options:

Currently there are three otions available.

*	theme: dashboard, jqui, vista
*	toggle: true, false
*	locale: en-US, de-DE, fr-FR, it-IT, nl-NL, cs-CZ, ru-RU

This plugin is intended to be simple and a quick fix.
Actually there are a bunch of cool options available in 
[Mootools Datepicker](http://mootools.net/forge/p/mootools_datepicker) 
that is not covered here.
You may want to change the code to suit your needs.

License
-------

[MIT License](http://www.opensource.org/licenses/mit-license.php)
