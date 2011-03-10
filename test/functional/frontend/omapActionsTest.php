<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('omapf?page=2')->

  with('request')->begin()->
    isParameter('module', 'omap')->
    isParameter('action', 'filter')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by community (101), filter by engineering (4)
  setField('ao_map_filters[order_by]', 101)->
  setField('ao_map_filters[faculty_id]', 4)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('show')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

$browser->
  get('rank')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->
  
  click('Director')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()  
;

