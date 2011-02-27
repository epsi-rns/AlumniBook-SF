<?php

/**
 * office actions.
 *
 * @package    alumni
 * @subpackage office
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class officeActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->address = $this->getRowsByFormWithPagerOrdered(
		$request, 'OAddressFormFilter', 'Offices', 6);		
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('oid');
    $this->org = Doctrine_Core::getTable('Organization')->find(array($index));
	$this->forward404Unless($this->org);
    
	$this->address = Doctrine_Core::getTable('OAddress')
		->createQuery('d')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->oid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->address = Doctrine_Core::getTable('OAddress')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->address);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->lid = $request->getParameter('oid');
	$this->forward404Unless($this->lid);

    $this->form = new OAddressForm();
    $this->form->setDefault('lid', $this->lid); 
    $this->form->setDefault('link_type', 'O');     
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $address = $this->forward404UnlessExist($request);
    $this->form = new OAddressForm($address);
  }

  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'OAddress', 'OAddressForm', 
		'office/index', 'did', 'o_address');
  }
}
