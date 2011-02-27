<?php

/**
 * sfWidgetFormInputPicker represents a date picker with HTML text input tag.
 *
 * @package    sfMooDatePickerPlugin
 * @subpackage widget
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */

class sfWidgetFormDatePicker extends sfWidgetForm
{

  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('theme', '');
    $this->addOption('locale', '');
    $this->addOption('toggle', false);
	$this->pickerPath = '/sfMooDatePickerPlugin';

    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {	  
    $attrs = array_merge(array('size' => 16), $attributes);
    $input = new sfWidgetFormInput(array(), $attrs);
    $html = $input->render($name, $value);

    $attrs = array_merge(
			array(
				'type' => $this->getOption('type'), 
				'name' => $name, 
				'value' => $value
			), $attributes);
	$attrs = $this->fixFormId($attrs);
    
    // identification namespace ;-)
    $idns = $attrs['id'];    

	$path = $this->pickerPath.'/images';    		
	$clear	= '<img class="calendar" id="'.$idns.'_clear" '
				.'alt="clear" title="clear" '
				.'src="'.$path.'/tango/edit-clear.png" />';
	
	if	($this->getOption('toggle'))
	{
		$pick	= '<img src="'.$path.'/silk/date.png" '
				.'alt="pick date" title="pick date" '
				.'id="'.$idns.'_pick" style="float: none; margin: 0px;" />';
		$doc_toggle = "toggle: '{$idns}_pick',";
	}
	else
	{
		$pick = '';	
		$doc_toggle = '';
	}

    $theme = $this->getOption('theme');				
    if	(in_array($theme, array('dashboard', 'jqui', 'vista')))				
		$doc_picker_class = "pickerClass: 'datepicker_$theme'";
	else	
		$doc_picker_class = '';
	
	
	if	($this->getOption('locale'))
		$doc_locale	= "Locale.use('$locale');";
	else
		$doc_locale = '';

// Heredoc Syntax
$moo = <<<MOO
<script type="text/javascript">
	$doc_locale

	window.addEvent("domready",function(){	
		new Picker.Date('$idns', {
			format: '%Y-%m-%d',
			useFadeInOut: !Browser.ie,
			$doc_toggle
			$doc_picker_class
		});
		document.id('{$idns}_clear').addEvent('click', function() { 
			document.id('$idns').set('value', '');
		});	
	});
</script>
MOO;
		
	return $html."\n".$pick."\n".$clear."\n".$moo."\n";
  }  
  
  public function getStylesheets()
  {
	$path = $this->pickerPath.'/css';
    $css = array($path.'/datepicker.css' => 'all');
    
    $theme = $this->getOption('theme');
    if (in_array($theme, array('dashboard', 'jqui', 'vista')))
		$css[$path.'/datepicker_'.$theme.'/datepicker_'.$theme.'.css'] = 'all';
		
    return $css;
  }  
  
  public function getJavaScripts()
  {
	$path = $this->pickerPath.'/js';
    $locale = $this->getOption('locale');
    if (empty($locale)) $locale = 'en-US';	
	
    $js = array();
    $js[] = $path.'/Locale.'.$locale.'.DatePicker.js';
    $js[] = $path.'/Picker.js';
    $js[] = $path.'/Picker.Attach.js';
    $js[] = $path.'/Picker.Date.js';
    		
    return $js;
  }
}
