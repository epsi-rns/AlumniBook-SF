<?php

/**
 * amap actions.
 *
 * @package    alumni
 * @subpackage amap
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class filterAction extends sfActionsExt
{
  public function executeFilter(sfWebRequest $request)
  {
    $query = Doctrine_Core::getTable('AOMap')
      ->createQuery('m')
      ->select('m.*, a.name, o.name, a.fullname, o.fullname, j.*, ac.*')
      ->leftJoin('m.Alumni a')
      ->leftJoin('m.Organization o')
      ->leftJoin('m.JobType j')
	  ->leftJoin('a.ACommunities ac')
      ->leftJoin('j.Translation t')
      ->where('t.lang = ?', $this->getUser()->getCulture());
      
    $this->formFilter = new AOMapFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName(),
		array('order_by' => 4, 'job_type_id' => null));
 
	$this->order_by = $filters['order_by'];
	$this->formFilter->setQuery($query);
    $this->formFilter->bind( $filters );            

    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);
                  
	$this->ao_maps = $this->getRowsByPager($request, $query, 'AOMap');
  }  

  protected function mapGetToPostParams()
  {
	$filters = parent::mapGetToPostParams();
	$request = $this->getRequest();
				
	if	($request->hasParameter('id'))
		$filters['job_type_id'] = (int) $request->getParameter('id');		

	return	 $filters;
  }	    
}
