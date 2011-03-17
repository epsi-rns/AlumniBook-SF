<?php

/**
 * adegrees actions.
 *
 * @package    alumni
 * @subpackage adegrees
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class adegreesActions extends sfActionsAlumniCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->a_degrees = $this->getRowsByFormWithPagerOrdered(
		$request, 'ADegreesFormFilter', 'ADegrees', 105);
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->a_degrees = Doctrine_Core::getTable('ADegrees')
		->createQuery('d')
		->leftJoin('d.Alumni a')
		->leftJoin('d.Strata s')
		->where('d.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->a_row = Doctrine_Core::getTable('ADegrees')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->a_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$aid = $request->getParameter('aid');
	$this->forward404Unless($aid);

    $this->form = new ADegreesForm();
    $this->form->setDefault('aid', $aid);
    $this->form->setDefault('strata_id', 10); 
    $this->form->setDefault('degree', 'ST');     
    $this->form->setDefault('institution', 'University of Indonesia'); 
    $this->form->setDefault('major', 'Engineering'); 
  }

  public function executeEdit(sfWebRequest $request)
  {
    $a_degrees = $this->forward404UnlessExist($request);
    $this->form = new ADegreesForm($a_degrees);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'ADegrees', 'ADegreesForm', 
		'adegrees/index', 'did', 'a_degrees');
  }
}

