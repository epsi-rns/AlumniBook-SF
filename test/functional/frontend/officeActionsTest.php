<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('office/index')->

  with('request')->begin()->
    isParameter('module', 'office')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
  end()->
  
  // sort by region (61)
  setField('o_address_filters[order_by]', 61)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

