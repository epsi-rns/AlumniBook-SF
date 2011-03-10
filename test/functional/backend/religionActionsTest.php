<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfAuthBrowser());

$browser->
  doAuth('admin', 'admin')->
 
  get('/religion')->

  with('request')->begin()->
    isParameter('module', 'religion')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;
