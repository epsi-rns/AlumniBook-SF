<?php

/**
 * community actions.
 *
 * @package    alumni
 * @subpackage community
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class communityActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {  
	$this->communities = $this->getRowsByFormWithPagerOrdered(
		$request, 'CommunityBrowseFormFilter', 'Community', 84);
  }

  public function executeShow(sfWebRequest $request)
  {
    //	$this->community = Doctrine_Core::getTable('Community')
    //		->find(array($request->getParameter('cid')));
	
	$q = Doctrine_Core::getTable('Community')
		->createQuery('c')
		->where('c.cid = ?', $request->getParameter('cid'))
		->limit(1); 
	$rows =	$q->execute();
	$this->community = $rows[0];
	
    $this->forward404Unless($this->community);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CommunityFrontendForm();
  }

  public function executeEdit(sfWebRequest $request)
  {
    $community = $this->forward404UnlessExist($request);
    $this->form = new CommunityFrontendForm($community);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'Community', 'CommunityFrontendForm', 
		'community/index', 'cid', 'community');
  }
}
