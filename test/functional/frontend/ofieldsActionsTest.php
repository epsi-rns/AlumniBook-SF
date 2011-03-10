<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('ofields/filter?page=2')->

  with('request')->begin()->
    isParameter('module', 'ofields')->
    isParameter('action', 'filter')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by business field (41)
  setField('o_fields_filters[order_by]', 46)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

$browser->
  get('field')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->
  
  click('Energy')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()  
;

