<?php

/**
 * ocontacts actions.
 *
 * @package    alumni
 * @subpackage ocontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ocontactsActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->contacts = $this->getRowsByFormWithPagerOrdered(
		$request, 'OContactsFormFilter', 'OContacts', 6);
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('oid');
    $this->org = Doctrine_Core::getTable('Organization')->find(array($index));
	$this->forward404Unless($this->org);
    
	$this->contacts = Doctrine_Core::getTable('OContacts')
		->createQuery('d')
		->leftJoin('d.ContactType ct')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->oid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->row = Doctrine_Core::getTable('OContacts')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->lid = $request->getParameter('oid');
	$this->forward404Unless($this->lid);

    $this->form = new OContactsForm();
    $this->form->setDefault('lid', $this->lid); 
    $this->form->setDefault('link_type', 'O'); 
  }

  public function executeEdit(sfWebRequest $request)
  {
    $contacts = $this->forward404UnlessExist($request);
    $this->form = new OContactsForm($contacts);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'OContacts', 'OContactsForm', 
		'ocontacts/index', 'did', 'o_contacts');
  }
}
