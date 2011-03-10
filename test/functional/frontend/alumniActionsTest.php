<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('alumni/index?page=2')->

  with('request')->begin()->
    isParameter('module', 'alumni')->
    isParameter('action', 'index')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by updated time (12), filter by engineering (4), name 'anonymous'
  setField('alumni_filters[order_by]', 12)->
  setField('alumni_filters[faculty_id]', 4)->
  setField('alumni_filters[name]', '%nymous%')->
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
  get('birth')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

$browser->
  get('adet/25')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->

  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;
