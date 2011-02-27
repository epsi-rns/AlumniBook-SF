<?php

/**
 * sfActionsExt general base class for frontend actions
 *
 * @package    alumni
 * @subpackage actions
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
abstract class sfActionsExt extends sfActions
{
  /* Filtering Method */
  protected function getSessionFilters()
  {
	$request = $this->getRequest();
	$module = $request->getParameter('module');
	$action = $request->getParameter('action');	  
	
    return $this->getUser()->getAttribute(
		$module.'.'.$action, array(), 'alumnibook/'.$module.'/'.$action);
  }

  protected function setSessionFilters(array $filters)
  {
	$request = $this->getRequest();
	$module = $request->getParameter('module');
	$action = $request->getParameter('action');	  
	
    return $this->getUser()->setAttribute(
		$module.'.'.$action, $filters, 'alumnibook/'.$module.'/'.$action);
  }
    
  // Pagination
  // http://groups.google.fr/group/symfony-users/browse_thread/thread/498272f716a3c1b6	  
  protected function getRowsByPager(
	sfWebRequest $request, Doctrine_Query $query, $model_name)
  {	
	$this->pager = new sfDoctrinePager($model_name,
		sfConfig::get('app_max_pagination')	);
	$this->pager->setQuery($query);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
	
	return $this->pager->getResults();
  }
  
  protected function mapGetToPostParams()  {} // no abstract
  
  protected function getRequestFilter(sfWebRequest $request, 
	$formFilterName, array $defaults = array())
  {
	if ($request->hasParameter('_reset'))
    {
      $this->setSessionFilters($this->configuration->getFilterDefaults());
	  
	  $module = $request->getParameter('module');
	  $action = $request->getParameter('action');	  
      $this->redirect($module.'/'.$action);
    }

    if	($request->isMethod('post')) 
 		$filters = $request->getParameter($formFilterName);		
    else
    if	($request->isMethod('get'))
    {
		if	($request->hasParameter('page'))
			$filters = $this->getSessionFilters();
		else
			$filters = $this->mapGetToPostParams();				
	}

	foreach ($defaults as $key => $value)
		if (!isset($filters[$key]))
			$filters[$key] = $value;    

	$this->setSessionFilters( $filters );
	return $filters;
  }
  
  // this is a compressed version from a commonly used action field
  // for index, Crossed my mind to shorten the funtion name 
  // to gRBFWPO(), but then I think it's a bad idea.
  
  // Okey, I know this function is for a very specific task.
  // $formFilterName is the formFilter you want to use
  // and $order_by_default weird number is defined in this formFilter
  // just have lok at the sample.
  
  protected function getRowsByFormWithPagerOrdered(sfWebRequest $request,
	$formFilterName, $model_name, $order_by_default)
  {
    $this->formFilter = new $formFilterName();    

	$filters = $this->getRequestFilter(
		$request, 
		$this->formFilter->getName(), 
		array('order_by' => $order_by_default)
	);
 
	$this->order_by = $filters['order_by'];
    $this->formFilter->bind( $filters );            

    $query = $this->formFilter->buildQuery(
		$this->formFilter->getValues()
	);
		
	return $this->getRowsByPager($request, $query, $model_name);	  
  }
}
