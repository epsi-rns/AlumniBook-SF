<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('org/index?page=2')->

  with('request')->begin()->
    isParameter('module', 'org')->
    isParameter('action', 'index')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by updated time (12), filter by name 'departement'
  setField('org_filters[order_by]', 12)->
  setField('alumni_filters[name]', '%epa%')->
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
  get('org/filter?page=2')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

$browser->
  get('odet/25')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->

  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;
