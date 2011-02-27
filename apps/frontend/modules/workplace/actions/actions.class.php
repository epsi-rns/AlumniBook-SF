<?php

/**
 * workplace actions.
 *
 * @package    alumni
 * @subpackage workplace
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class workplaceActions extends sfActionsExtCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->address = $this->getRowsByFormWithPagerOrdered(
		$request, 'MAddressFormFilter', 'WorkPlaces', 6);		
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('mid');
    $this->map = Doctrine_Core::getTable('AOMap')->find(array($index));
	$this->forward404Unless($this->map);   
  
	$this->address = Doctrine_Core::getTable('MAddress')
		->createQuery('d')
		->where('d.lid = ?', $index)
		->execute();
		
	$this->mid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->address = Doctrine_Core::getTable('MAddress')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->address);
    
    $this->map = Doctrine_Core::getTable('AOMap')
		->find($this->address->getLid());
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->lid = $request->getParameter('mid');
	$this->forward404Unless($this->lid);

    $this->form = new MAddressForm();
    $this->form->setDefault('lid', $this->lid); 
    $this->form->setDefault('link_type', 'M');    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $address = $this->forward404UnlessExist($request);
    $this->form = new MAddressForm($address);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'MAddress', 'MAddressForm', 
		'workplace/index', 'did', 'm_address');
  }
}
