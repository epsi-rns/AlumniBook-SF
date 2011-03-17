<?php

/**
 * acontacts actions.
 *
 * @package    alumni
 * @subpackage acontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class acontactsActions extends sfActionsAlumniCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->contacts = $this->getRowsByFormWithPagerOrdered(
		$request, 'AContactsFormFilter', 'AContacts', 6);
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->contacts = Doctrine_Core::getTable('AContacts')
		->createQuery('d')
		->leftJoin('d.ContactType ct')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->row = Doctrine_Core::getTable('AContacts')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$lid = $request->getParameter('aid');
	$this->forward404Unless($lid);

    $this->form = new AContactsForm();
    $this->form->setDefault('lid', $lid); 
    $this->form->setDefault('link_type', 'A'); 
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $contacts = $this->forward404UnlessExist($request);
    $this->form = new AContactsForm($contacts);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'AContacts', 'AContactsForm', 
		'acontacts/index', 'did', 'a_contacts');
  }
}
