Symfony-FormInputLookupModal-Plugin
=========================================

This sfFormInputLookupModalPlugin is for Symfony 1.4 and Mootools 1.3.

This plugin doesn't really create a modal.
But rather prepare universal widget
for use in conjunction with any lightbox varians,
e.g. Diabox, Mediabox, or Slimbox.

This widget only one small file.
But since it needs one long page of documentation,
it is released as plugin.

sfWidgetFormInputLookupModal
------------------------

It has read only input text
whose value can be changed via Diabox iframe modal.
The iframe modal itself triggered by a simple link.
Then the value and text sent back utilizing unobtrusive javascript.

How to use
----------

It is simple, but it has scattered parts in few steps.

*	Add mootools libraries to view.yml.
*	Activate lightbox plugin, in your project.
	It is a mandatory dependency. Mootools 1.3 required.
*	Activate this sfWidgetFormInputLookupModal plugin,
	or just copy this one file to your lib directory.
*	Prepare your form or formfilter to use this widget.
*	Create a regular page (not ajax),
	to be shown in your modal iframe.
	
Form Preparation
----------------

In your form template the code would look like:

    // apps/frontend/modules/amap/templates/_form.php

	use_helper('sfMooDiaBox'); 
	plgContentDiaBoxFrameActivate();

	
Parent Window	
-------------

For form code that looks like:

    //	lib/form/doctrine/AMapForm.class.php
    	
    class AMapForm extends AOMapForm
    {
      public function configure()
      {
    	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
    	
    	$this->widgetSchema['org_id'] = new sfWidgetFormInputLookupModal(
    		array(	'model' => 'Organization', 
    				'link_text' => 'Pick Organization/ Company', 
    				'link_route' => 'modal/org'),
    		array(	'class' => 'icon_pick', 
    				'title' => 'Lookup Organization/ Company Name')
    	);
    	$this->widgetSchema['org_id']->setLabel('Organization');
    	$this->validatorSchema['org_id'] = new sfValidatorPass(); 
	
        unset(
          $this['created_at'], $this['updated_at']
        );
      }
    }	


This would render the template as:

    <input type="hidden" name="ao_map[org_id]"
        value="25" id="ao_map_org_id" />
    <input readonly="readonly" type="text" name="ao_map_org_id_text"
        value="Citra Jayaara Andalan" id="ao_map_org_id_text" />
    <a rel="lightbox" class="icon_pick" 
        title="Lookup Organization/ Company Name" 
        href="/frontend_dev.php/modal/org">Pick Organization/ Company</a>
    <script type="text/javascript">
	    window.addEvent('domready', function() {
		    el_lookup	= document.id('ao_map_org_id');
		    el_text		= document.id('ao_map_org_id_text');
	    });
    </script>


IFrame Window
-------------

The rendered template above create ref to /modal/org .
The code in template would be:

	//	apps/frontend/modules/modal/templates/orgSuccess.php

	<script type="text/javascript">
		window.addEvent('domready', function() {
			$$('.pick').addEvent('click', function(){
				window.parent.el_lookup.set('value', this.get('id'));
				window.parent.el_text.set('value', this.get('text'));
				window.parent.diabox.hide();
			});
		});
	</script>
	
	<a href="#" class="pick" value"123">My Text</a>


When it's clicked,
this would set hidden value to 123,
set the input text to 'My Text',
then it close the iframe Window.
	
License
-------

[MIT License](http://www.opensource.org/licenses/mit-license.php)
