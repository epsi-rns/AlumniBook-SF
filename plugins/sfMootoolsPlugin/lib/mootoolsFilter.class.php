<?php

/**
 * mootoolsFilter activate mootools core and more javascript
 * in a case when you don't want to use view.yml
 * or need more customizable configuration
 *
 * @package    sfMootoolsPlugin
 * @subpackage widget
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class mootoolsFilter extends sfFilter
{
  public function execute($filterChain)
  {
    // Execute this filter only once
    if ($this->isFirstCall())
    {
	  $path = sfConfig::get('app_mootools_plugin_path');
	  $core = sfConfig::get('app_mootools_core');
	  $more = sfConfig::get('app_mootools_more');
	  
	  $core = $this->get_fullpath($path, $core);
	  $more = $this->get_fullpath($path, $more);

      // Filters don't have direct access to the response objects.
      // You will need to use the context object to get them
      $response = $this->getContext()->getResponse();      
      $response->addJavascript($core, 'first');
      $response->addJavascript($more, 'first');
    }
 
    // Execute next filter
    $filterChain->execute();
  }
  
  private function get_fullpath($path, $script) 	
  {
	if (strpos($script, 'http://') === false)
		$script = $path.'/'.$script;
	return	$script;
  }
}
