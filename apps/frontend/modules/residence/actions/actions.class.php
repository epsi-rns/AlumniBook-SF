<?php

/**
 * residence actions.
 *
 * @package    alumni
 * @subpackage residence
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class residenceActions extends sfActionsAlumniCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->address = $this->getRowsByFormWithPagerOrdered(
		$request, 'AAddressFormFilter', 'Homes', 6);		
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->address = Doctrine_Core::getTable('AAddress')
		->createQuery('d')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->address = Doctrine_Core::getTable('AAddress')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->address);
  }

  public function executeNew(sfWebRequest $request)
  {
	$lid = $request->getParameter('aid');
	$this->forward404Unless($lid);

    $this->form = new AAddressForm();
    $this->form->setDefault('lid', $lid); 
    $this->form->setDefault('link_type', 'A');     
  }

  public function executeEdit(sfWebRequest $request)
  {
    $address = $this->forward404UnlessExist($request);
    $this->form = new AAddressForm($address);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'AAddress', 'AAddressForm', 
		'residence/index', 'did', 'a_address');
  }
}
