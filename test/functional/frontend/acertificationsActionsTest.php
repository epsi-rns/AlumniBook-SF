<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('acertifications/index?page=2')->

  with('request')->begin()->
    isParameter('module', 'acertifications')->
    isParameter('action', 'index')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by certification (41), filter by engineering (4)
  setField('a_certifications_filters[order_by]', 41)->
  setField('a_certifications_filters[faculty_id]', 4)->
  click('Apply')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->  
  
  click('edit')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()
;

