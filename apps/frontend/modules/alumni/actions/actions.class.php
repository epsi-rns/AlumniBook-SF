<?php

/**
 * alumni actions.
 *
 * @package    alumni
 * @subpackage alumni
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class alumniActions extends sfActionsAlumniCRUD
{
  public function executeBirth(sfWebRequest $request)
  {
	$this->birth = $this->getRowsByFormWithPagerOrdered(
		$request, 'AlumniBirthFormFilter', 'Alumni', 75);
  }	
	
  public function executeDetail(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
	$this->aid = $index;
	
	$this->one = Doctrine_Core::getTable('Alumni')
		->find(array($index));
    $this->forward404Unless($this->one);
		
	$this->maps = Doctrine_Core::getTable('AOMap')
		->findByDql('aid = ?', $index);	
  }  

  public function executeIndex(sfWebRequest $request)
  {
	$this->alumni = $this->getRowsByFormWithPagerOrdered(
		$request, 'AlumniFormFilter', 'Alumni', 1);
  }

  public function executeShow(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
    $this->forward404Unless($this->alumni);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlumniForm();
  }

  public function executeEdit(sfWebRequest $request)
  {
	$alumni = $this->forward404UnlessExist($request);
    $this->form = new AlumniForm($alumni);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'Alumni', 'AlumniForm', 
		'alumni/index', 'aid', 'alumni');
  }
}
