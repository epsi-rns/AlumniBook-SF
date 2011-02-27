<?php

/**
 * aexperiences actions.
 *
 * @package    alumni
 * @subpackage aexperiences
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class aexperiencesActions extends sfActionsAlumniCRUD
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->a_experiences = $this->getRowsByFormWithPagerOrdered(
		$request, 'AExperiencesFormFilter', 'AExperiences', 105);
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->a_experiences = Doctrine_Core::getTable('AExperiences')
		->createQuery('d')
		->leftJoin('d.Alumni a')
		->where('d.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->a_row = Doctrine_Core::getTable('AExperiences')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->a_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->aid = $request->getParameter('aid');
	$this->forward404Unless($this->aid);

    $this->form = new AExperiencesForm();
    $this->form->setDefault('aid', $this->aid);     
  }

  public function executeEdit(sfWebRequest $request)
  {
    $a_row = $this->forward404UnlessExist($request);
    $this->form = new AExperiencesForm($a_row);
  }

  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'AExperiences', 'AExperiencesForm', 
		'aexperiences/index', 'did', 'a_experiences');
  }
}

