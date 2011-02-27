<?php

/**
 * acertifications actions.
 *
 * @package    alumni
 * @subpackage acertifications
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class acertificationsActions extends sfActionsAlumniCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->a_certifications = $this->getRowsByFormWithPagerOrdered(
		$request, 'ACertificationsFormFilter', 'ACertifications', 105);
  }

  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->a_certifications = Doctrine_Core::getTable('ACertifications')
		->createQuery('d')
		->leftJoin('d.Alumni a')
		->where('d.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->a_row = Doctrine_Core::getTable('ACertifications')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->a_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->aid = $request->getParameter('aid');
	$this->forward404Unless($this->aid);

    $this->form = new ACertificationsForm();
    $this->form->setDefault('aid', $this->aid);    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $a_certifications = $this->forward404UnlessExist($request);
    $this->form = new ACertificationsForm($a_certifications);
  }

  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'ACertifications', 'ACertificationsForm', 
		'acertifications/index', 'did', 'a_certifications');
  }
}
