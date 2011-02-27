<?php

/**
 * cover actions. created manually
 */
class coverActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {     
    $this->last_update = Doctrine_Core::getTable('Alumni')->getLastUpdate();

    $this->form = new sfFormLanguage($this->getUser(), 
		array('languages' => array('en', 'id')));
	unset($this->form[$this->form->getCSRFFieldName()]);
  }
  
  public function executeFeed(sfWebRequest $request)
  { 
	$request->setRequestFormat('atom');
	  
	$this->last_update = Doctrine_Core::getTable('Alumni')->getLastUpdateForAtom();
	$this->rows = Doctrine_Core::getTable('Alumni')->getAlumniForAtom();
  }   
  
  public function executeAbout(sfWebRequest $request)
  {  }
  
  public function executeScreenshot(sfWebRequest $request)
  {  }
  
  public function executeDevnews(sfWebRequest $request)
  {  }    
  
  public function executeIluni(sfWebRequest $request)
  {  }  
}
