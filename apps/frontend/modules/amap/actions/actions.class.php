<?php

/**
 * amap actions.
 *
 * @package    alumni
 * @subpackage amap
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class amapActions extends sfActionsExtCRUD
{
  public function executeCategory(sfWebRequest $request)
  {
    $this->cats = Doctrine_Core::getTable('JobType')
      ->createQuery('j')
      ->select('j.job_type_id, t.job_type, COUNT(m.aid) AS total')
      ->leftJoin('j.AOMap m')
      ->leftJoin('j.Translation t')
      ->where('t.lang = ?', $this->getUser()->getCulture())      
	  ->groupBy('j.job_type_id, t.job_type')
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
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->ao_maps = Doctrine_Core::getTable('AOMap')
		->createQuery('m')
		->leftJoin('m.Organization o')
		->leftJoin('m.JobType jt')
		->leftJoin('m.JobPosition jp')
		->leftJoin('jp.Translation t')
		->where('t.lang = ?', $this->getUser()->getCulture())		
		->where('m.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ao_map = Doctrine_Core::getTable('AOMap')
		->find(array($request->getParameter('mid')));
    $this->forward404Unless($this->ao_map);
  }

  public function executeNew(sfWebRequest $request)
  {
	$aid = $request->getParameter('aid');
	$this->forward404Unless($aid);

    $this->form = new AMapForm();
    $this->form->setDefault('aid', $aid); 
    
    $widgetSchema = $this->form->getWidgetSchema();
	$widgetSchema['aid'] = new sfWidgetFormInputHidden();
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $ao_map = $this->forward404UnlessExist($request);
    $this->form = new AMapForm($ao_map);
    
    $widgetSchema = $this->form->getWidgetSchema();
	$widgetSchema['aid'] = new sfWidgetFormInputHidden();
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'AOMap', 'AMapForm', 
		'@amap_filter', 'mid', 'a_map');
  }
}
