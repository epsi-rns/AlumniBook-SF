<?php

/**
 * sfWidgetFormInputLookupModal represents a modal picker with HTML text input tag.
 *
 * @package    sfWidgetFormInputLookupModalPlugin
 * @subpackage widget
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */

class sfWidgetFormInputLookupModal extends sfWidgetForm
{

  protected function configure($options = array(), $attributes = array())
  {
	$this->addRequiredOption('model');	  
    $this->addOption('link_text', 'Pick');
    $this->addOption('link_route', '');

    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {	  
    $input = new sfWidgetFormInputHidden();
    $content_value = $input->render($name, $value);	

    $attrs = array_merge(
			array(
				'type' => $this->getOption('type'), 
				'name' => $name, 
				'value' => $value
			), $attributes);
	$attrs = $this->fixFormId($attrs);
	
    // identification namespace ;-)
    $idns = $attrs['id'];    
    $idns_text = $idns.'_text';
    

    $object = Doctrine_Core::getTable($this->getOption('model'))
		->find(array($value));
    
    $value_text = ($object) ? $object->__toString() : '';
    $attrs_text = array('readonly' => 'readonly');    
    $input = new sfWidgetFormInput(array(), $attrs_text);
    $content_text = $input->render($idns_text, $value_text);
    
    $link_text = $this->getOption('link_text');
    $link_route = $this->getOption('link_route');
    $attrs_link = array_merge(array('rel' => 'lightbox'), $attributes);    
    
    $content_picker = link_to($link_text, $link_route, $attrs_link);

// Heredoc Syntax
$content_moo = <<<MOO
<script type="text/javascript">
	window.addEvent('domready', function() {
		el_lookup	= document.id('{$idns}');
		el_text		= document.id('{$idns_text}');
	});
</script>
MOO;
		
	return $content_value."\n"
		.$content_text."\n"
		.$content_picker."\n"
		.$content_moo."\n";
  }  
  
}
