<?php

/**
 * acommunities actions.
 *
 * @package    alumni
 * @subpackage acommunities
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
 
class acommunitiesActions extends sfActionsAlumniCRUD
{
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
	    
	$this->a_communities = Doctrine_Core::getTable('ACommunities')
		->createQuery('d')
		->leftJoin('d.Alumni a')
		->leftJoin('d.Community c')
		->leftJoin('d.Faculty f')
		->leftJoin('d.Department de')
		->leftJoin('d.Program p')
		->where('d.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->a_row = Doctrine_Core::getTable('ACommunities')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->a_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->aid = $request->getParameter('aid');
	$this->forward404Unless($this->aid);

    $this->form = new ACommunitiesForm();    
    $this->form->setDefault('aid', $this->aid); 
  }

  public function executeEdit(sfWebRequest $request)
  {
	$a_communities = $this->forward404UnlessExist($request);
    $this->form = new ACommunitiesForm($a_communities);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'ACommunities', 'ACommunitiesForm', 
		'acommunities/filter', 'did', 'a_communities');
  }		
}
