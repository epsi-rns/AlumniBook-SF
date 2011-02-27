<?php

/**
 * common actions. created manually
 */
class commonActions extends sfActions
{
  public function executeError404(sfWebRequest $request)
  { 
	$this->setLayout(false);
  }
  
  public function executeLanguage(sfWebRequest $request)
  {  
	$all_languages = array('en', 'id');
    $this->form = new sfFormLanguage($this->getUser(), 
		array('languages' => $all_languages));
	unset($this->form[$this->form->getCSRFFieldName()]);
		
    if ($this->form->process($request))
    {
      // culture has been changed
      return $this->redirect('@homepage');
    }
    
    // else second method
    $lang = $this->getRequestParameter('lang',false);
	if (in_array($lang, $all_languages))
  	{	
  		$this->getUser()->setCulture($this->getRequestParameter('lang'));
  		// $this->redirect($this->getRequestParameter('redirect'));
  		$this->redirect( $this->getRequest()->getReferer() );  		
  	}    
    
    // who knows if all fails
    return $this->redirect('@homepage');
  }      
    
  // ajax
  public function executeMenu(sfWebRequest $request)
  {  
	sfConfig::set('sf_web_debug', false);		  
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;
  }      
}
