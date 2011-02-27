<?php

/**
 * ofields actions.
 *
 * @package    alumni
 * @subpackage ofields
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class filterAction extends sfActionsExt
{
  public function executeFilter(sfWebRequest $request)
  {  
    $this->formFilter = new OFieldsFormFilter();    

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName(),
		array('order_by' => 23, 'biz_field_id' => null));
 
	$this->order_by = $filters['order_by'];
    $this->formFilter->bind( $filters );            

    $query = $this->formFilter->buildQuery(
			$this->formFilter->getValues()
		);
            
	$this->o_fields = $this->getRowsByPager(
		$request, $query, 'OFields');
  }
  
  protected function mapGetToPostParams()
  {
	$filters = parent::mapGetToPostParams();
	$request = $this->getRequest();
				
	if	($request->hasParameter('id'))
		$filters['biz_field_id'] = (int) $request->getParameter('id');		

	return	 $filters;
  }	   
}
