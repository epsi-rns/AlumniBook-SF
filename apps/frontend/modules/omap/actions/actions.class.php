<?php

/**
 * omap actions.
 *
 * @package    alumni
 * @subpackage omap
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class omapActions extends sfActionsExtCRUD
{  
  public function executeCategory(sfWebRequest $request)
  {
    $this->cats = Doctrine_Core::getTable('JobPosition')
      ->createQuery('j')
      ->select('j.job_position_id, t.job_position, COUNT(m.aid) AS total')
      ->leftJoin('j.AOMap m')
      ->leftJoin('j.Translation t')
      ->where('t.lang = ?', $this->getUser()->getCulture())      
	  ->groupBy('j.job_position_id, t.job_position')
      ->execute();    
  }
 
  /*
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('AOMap')
      ->createQuery('m')
      ->leftJoin('m.Alumni a')
      ->leftJoin('m.Organization o')
      ->leftJoin('m.JobType jt')
      ->leftJoin('m.JobPosition jp');
      
	$this->pager = new sfDoctrinePager('AOMap',
		sfConfig::get('app_max_pagination')	);
	$this->pager->setQuery($q);
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();

	$this->ao_maps = $this->pager->getResults();
  }*/
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('oid');
    $this->org = Doctrine_Core::getTable('Organization')->find(array($index));
	$this->forward404Unless($this->org);
    
	$this->ao_maps = Doctrine_Core::getTable('AOMap')
		->createQuery('m')
		->leftJoin('m.Alumni a')
		->leftJoin('m.JobType jt')
		->leftJoin('m.JobPosition jp')
		->leftJoin('jp.Translation t')
		->where('t.lang = ?', $this->getUser()->getCulture())		
		->where('m.org_id = ?', $index)
		->execute();
		
	$this->org_id = $index;
  }  

  public function executeShow(sfWebRequest $request)
  {
    $this->ao_map = Doctrine_Core::getTable('AOMap')
		->find(array($request->getParameter('mid')));
    $this->forward404Unless($this->ao_map);
  }

  public function executeNew(sfWebRequest $request)
  {
	$org_id = $request->getParameter('oid');
	$this->forward404Unless($org_id);

    $this->form = new OMapForm();
    $this->form->setDefault('org_id', $org_id); 
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $ao_map = $this->forward404UnlessExist($request);
    $this->form = new OMapForm($ao_map);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'AOMap', 'OMapForm', 
		'@omap_filter', 'mid', 'o_map');
  }
}
