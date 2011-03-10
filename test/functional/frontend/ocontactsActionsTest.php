<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('ocontacts/index?page=2')->

  with('request')->begin()->
    isParameter('module', 'ocontacts')->
    isParameter('action', 'index')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by contact type (47), filter by e-mail (8)
  setField('o_contacts_filters[order_by]', 47)->
  setField('o_contacts_filters[ct_id]', 4)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

