<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('editor', 'editor')->
  
  get('/department/index')->

  with('request')->begin()->
    isParameter('module', 'department')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;
