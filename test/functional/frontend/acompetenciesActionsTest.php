<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('acompetencies/filter?page=2')->

  with('request')->begin()->
    isParameter('module', 'acompetencies')->
    isParameter('action', 'filter')->
    isParameter('page', 2)->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->    
    checkElement('.pagination_desc', '#page 2#')->
  end()->
  
  // sort by competency (45), filter by engineering (4)
  setField('a_competencies_filters[order_by]', 45)->
  setField('a_competencies_filters[faculty_id]', 4)->
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
  get('compy')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()->
  
  click('Expert')->
  
  with('response')->begin()->
    isStatusCode(200)->
  end()  
;
