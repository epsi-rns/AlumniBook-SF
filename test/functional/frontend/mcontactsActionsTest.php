<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('mcontacts/index?page=2')->

  with('request')->begin()->
    isParameter('module', 'mcontacts')->
    isParameter('action', 'index')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by contact type (47), filter by engineering (4)
  setField('m_contacts_filters[order_by]', 47)->
  setField('m_contacts_filters[faculty_id]', 4)->
  setField('m_contacts_filters[ct_id]', 4)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

