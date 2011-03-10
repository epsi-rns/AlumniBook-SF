<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('workplace/index')->

  with('request')->begin()->
    isParameter('module', 'workplace')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
  end()->
  
  // sort by region (61), filter by engineering (4)
  setField('m_address_filters[order_by]', 61)->
  setField('m_address_filters[faculty_id]', 4)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

