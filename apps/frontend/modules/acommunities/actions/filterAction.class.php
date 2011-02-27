<?php

/**
 * acommunities actions.
 *
 * @package    alumni
 * @subpackage acommunities
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class filterAction extends sfActionsAlumni
{

  public function executeFilter(sfWebRequest $request)
  {
    $this->formFilter = new ACommunitiesFormFilter();

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName(), array('order_by' => 85));
 
	$this->order_by = $filters['order_by'];
    $this->formFilter->bind( $filters );            

    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);
		
	// saved basic query for summary	
	$total_query = clone $query; 
	
	$r = $query->getRootAlias();
	$query
		->leftJoin($r.'.Alumni a')
		->leftJoin($r.'.Community c');
	
	
	if	( isset($filters['order_by']) )
		$this->addOrderByQuery($query, $filters['order_by']);
		
	$this->a_communities = $this->getRowsByPager(
		$request, $query, 'ACommunities');
	
	$this->uri = 'acommunities/filter?'.$this->rebuildParams(
		array('dept', 'prog', 'fcly', 'year')
	);		
	
	$year	= $request->getParameter('year');
	$decade	= $request->getParameter('decade');
	if (! ($year || $decade) )
	{
		$this->summary = $this->getRowYearSummary($request, $total_query);
		$this->link = 'acommunities/filter?'.$this->rebuildParams(
			array('dept', 'prog', 'fcly')
		);			
	}

  }
  
  // Query needed by summary, so
  // put here instead of moduleFormFilter.class.php
  private function addOrderByQuery(Doctrine_Query $query, $values) 
  {	  
	$order_by_choices = array(
		1  => 'r.did',
		21 => 'a.name',
		81 => 'r.community, a.name',
		82 => 'r.department_id, r.program_id, r.class_year, a.name',
		83 => 'r.faculty_id, r.department_id, r.program_id, r.class_year, a.name',
		84 => 'r.program_id, r.department_id, r.class_year, a.name',
		85 => 'r.class_year, r.department_id, a.name'	// default
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }    

  private function getRowYearSummary(sfWebRequest $request, $total_query)
  {
	$r = $total_query->getRootAlias();  
	$total_query
		->select($r.'.class_year, COUNT('.$r.'.aid) AS total')
		->groupBy($r.'.class_year');
	
	$pairs = array();
	$total_result = $total_query->execute();
	foreach ($total_result as $row) 
		$pairs[$row->getClassYear()] = (int) $row->getTotal();		

	return $pairs;
  }  
  
  protected function rebuildParams($params)
  {
	  $request = $this->getRequest();
	  
	  $url_params = array();
	  foreach($params as $param)
	  {
		  $value = $request->getParameter($param);  
		  if ($value) $url_params[] = $param.'='.$value;
	  }
	  return implode('&', $url_params);
  }   
}
