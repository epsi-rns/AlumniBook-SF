<?php

/**
 * sfActionsAlumni, sfActions class for Alumni related table.
 *
 * @package    alumni
 * @subpackage actions
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
abstract class sfActionsAlumni extends sfActionsExt
{
	
  protected function mapGetToPostParams()
  {
	$request = $this->getRequest();  
	  
	// dirty map get to post, with csrf token disabled
	$filters = array();

	if	($request->hasParameter('prog'))
		$filters['program_id'] = (int)$request->getParameter('prog');
			
	if	($request->hasParameter('dept'))
		$filters['department_id'] = (int) $request->getParameter('dept');	
			
	if	($request->hasParameter('fcly'))
		$filters['faculty_id'] = (int) $request->getParameter('fcly');		
			
	if	($request->hasParameter('year'))
		$filters['class_year'] = array(
			'text' => (int) $request->getParameter('year')
		);	
		
	if	($request->hasParameter('decade'))
		$filters['decade'] = (int)$request->getParameter('decade');	
		
	return	 $filters;
  }	
}
