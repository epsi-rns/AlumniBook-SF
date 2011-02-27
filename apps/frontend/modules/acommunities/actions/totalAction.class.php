<?php

/**
 * community actions.
 *
 * @package    alumni
 * @subpackage community
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class totalAction extends sfActionsExt
{
  public function executeTotal(sfWebRequest $request)
  {
    $this->formFilter = new TotalCommunitiesFormFilter();

	$filters = $this->getRequestFilter($request, 
		$this->formFilter->getName(), array('group_by' => 1));
 
	$this->group_by = $filters['group_by'];

	$query = $this->getTotalQuery();

    $this->formFilter->bind( $filters );            
	$this->t_communities = $this->getRowsByPager(
		$request, $query, 'ACommunities');
		
	// graph accesories
	$this->max = 0;
	foreach ($this->t_communities as $row) { 
		$this->sum += $total = $row->get('total');
		$this->max = ($this->max < $total) ? $total : $this->max; 
	}		
  }
  
  private function getTotalQuery()
  {
	$lang = $this->getUser()->getCulture();
	
	switch ($this->group_by) {
	  case 1: // Community
	    $query = Doctrine_Core::getTable('Community')
			->createQuery('c')
			->select('COUNT(ac.aid) AS total, '.
				'ac.cid, c.community, c.department_id, c.program_id')
			->leftJoin('c.ACommunities ac')
			->groupBy('c.community, c.department_id, c.program_id')
			->orderBy('c.cid')
			->having('total > 0');
	    break;  
	  case 2: // Department
	    $query = Doctrine_Core::getTable('Department')
			->createQuery('d')
			->select('COUNT(ac.aid) AS total, '.
				'ac.cid, c.cid, t.department, d.department_id')
			->leftJoin('d.Community c')
			->leftJoin('c.ACommunities ac')
			->leftJoin('d.Translation t')
			->where('t.lang = ?', $lang)			
			->groupBy(' t.department, d.department_id')
			->orderBy('d.department_id')
			->having('total > 0');			
	    break;  
	  case 3: // Faculty
	    $query = Doctrine_Core::getTable('Faculty')
			->createQuery('f')
			->select('COUNT(ac.aid) AS total, '.
				'ac.cid, c.cid, t.faculty, f.faculty_id')
			->leftJoin('f.Community c')
			->leftJoin('c.ACommunities ac')
			->leftJoin('f.Translation t')
			->where('t.lang = ?', $lang)			
			->groupBy(' t.faculty, f.faculty_id')
			->orderBy('f.faculty_id');
	    break;
	  case 4: // Program
	    $query = Doctrine_Core::getTable('Program')
			->createQuery('p')
			->select('COUNT(ac.aid) AS total, '.
				'ac.cid, c.cid, t.program, p.program_id')
			->leftJoin('p.Community c')
			->leftJoin('c.ACommunities ac')
			->leftJoin('p.Translation t')
			->where('t.lang = ?', $lang)	
			->groupBy(' t.program, p.program_id')
			->orderBy('p.program_id');
	    break;     
	  case 5: // Class of Year
	    $query = Doctrine_Core::getTable('ACommunities')
			->createQuery('ac')
			->select('COUNT(ac.aid) AS total, '.
				'c.cid, ac.class_year')
			->leftJoin('ac.Community c')
			->groupBy('ac.class_year')
			->orderBy('ac.class_year');
	    break;
	  case 6: // Community
	    $query = Doctrine_Core::getTable('ACommunities')
			->createQuery('ac')
			->select('COUNT(ac.aid) AS total, '.
				'c.cid, ac.class_year, ac.community')
			->leftJoin('ac.Community c')
			->groupBy('c.cid, ac.class_year')
			->orderBy('c.cid, ac.class_year');
	    break;  
	}  // switch	  
	
	return $query;
  }
}
