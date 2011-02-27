<?php

/**
 * org actions.
 *
 * @package    alumni
 * @subpackage org
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class orgActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->organizations = $this->getRowsByFormWithPagerOrdered(
		$request, 'OrganizationFormFilter', 'Organization', 1);
  }	
	
  public function executeFilter(sfWebRequest $request)
  {
	$this->organizations = $this->getRowsByFormWithPagerOrdered(
		$request, 'OrgFormFilter', 'Organization', 25);
  }
  
  public function executeDetail(sfWebRequest $request)
  {
	$index = $request->getParameter('org_id');
	$this->org_id = $index;
	
	$this->one = Doctrine_Core::getTable('Organization')
		->find(array($index));
    $this->forward404Unless($this->one);
    
	$this->maps = Doctrine_Core::getTable('AOMap')
		->findByDql('org_id = ?', $index);	
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->org = Doctrine_Core::getTable('Organization')
		->find(array($request->getParameter('org_id')));
    $this->forward404Unless($this->org);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OrganizationForm();
  }
  
  //  http://halestock.wordpress.com/2010/02/03/symfony-implementing-a-nested-set-part-one/
  public function executeEdit(sfWebRequest $request)
  {
    $organization = $this->forward404UnlessExist($request);
    $this->form = new OrganizationForm($organization);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'Organization', 'OrganizationForm', 
		'org/index', 'org_id', 'organization');
  }
}
