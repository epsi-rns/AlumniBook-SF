<?php

/**
 * modal actions provide lookup modal for use in iframe
 *
 * @package    alumni
 * @subpackage modal
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class modalActions extends sfActionsAlumni
{
  public function preExecute()
  {
    // The code inserted here is executed at the beginning of each action call
	sfConfig::set('sf_web_debug', false);	
  }

  public function executeAlumni(sfWebRequest $request)
  {
    $this->formFilter = new AlumniModalFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName());

    $this->formFilter->bind( $filters );            
    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);		      
      
	$this->alumni = $this->getRowsByPager($request, $query, 'Alumni');
  } 
  
  public function executeOrg(sfWebRequest $request)
  {
    $this->formFilter = new OrgModalFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName());

    $this->formFilter->bind( $filters );            
    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);		      
      
	$this->org = $this->getRowsByPager($request, $query, 'Organization');
  }   
  
  public function executeCommunity(sfWebRequest $request)
  {
    $this->formFilter = new CommunityModalFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName());

    $this->formFilter->bind( $filters );            
    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);		      
      
	$this->community = $this->getRowsByPager($request, $query, 'Community');
  }    
}
