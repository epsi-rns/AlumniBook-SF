<?php

/**
 * acompetencies actions.
 *
 * @package    alumni
 * @subpackage acompetencies
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class filterAction extends sfActionsAlumni
{
  public function executeFilter(sfWebRequest $request)
  {	
    $this->formFilter = new ACompetenciesFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName(), 
		array('order_by' => 105, 'competency_id' => null));
 
	$this->order_by = $filters['order_by'];
    $this->formFilter->bind( $filters );            

    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);
		      
	$this->a_competencies = $this->getRowsByPager(
		$request, $query, 'ACompetencies');
  }

  protected function mapGetToPostParams()
  {
	$filters = parent::mapGetToPostParams();
	$request = $this->getRequest();
				
	if	($request->hasParameter('id'))
		$filters['competency_id'] = (int) $request->getParameter('id');		

	return	 $filters;
  }	    
}
