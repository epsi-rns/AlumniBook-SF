<?php

/**
 * mcontacts actions.
 *
 * @package    alumni
 * @subpackage mcontacts
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class mcontactsActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->contacts = $this->getRowsByFormWithPagerOrdered(
		$request, 'MContactsFormFilter', 'MContacts', 6);
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('mid');
    $this->map = Doctrine_Core::getTable('AOMap')->find(array($index));
	$this->forward404Unless($this->map); 
  
	$this->contacts = Doctrine_Core::getTable('MContacts')
		->createQuery('d')
		->leftJoin('d.ContactType ct')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->mid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->row = Doctrine_Core::getTable('MContacts')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->row);
    
    $this->map = Doctrine_Core::getTable('AOMap')
		->find($this->row->getLid());
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->lid = $request->getParameter('mid');
	$this->forward404Unless($this->lid);

    $this->form = new MContactsForm();
    $this->form->setDefault('lid', $this->lid); 
    $this->form->setDefault('link_type', 'M'); 
  }

  public function executeEdit(sfWebRequest $request)
  {
    $contacts = $this->forward404UnlessExist($request);
    $this->form = new MContactsForm($contacts);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'MContacts', 'MContactsForm', 
		'mcontacts/index', 'did', 'm_contacts');
  }
}
