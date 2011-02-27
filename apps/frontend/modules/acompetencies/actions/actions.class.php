<?php

/**
 * acompetencies actions.
 *
 * @package    alumni
 * @subpackage acompetencies
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class acompetenciesActions extends sfActionsAlumniCRUD
{
  public function executeCategory(sfWebRequest $request)
  {
    $this->cats = Doctrine_Core::getTable('Competency')
      ->createQuery('c')
      ->select('c.competency_id, t.competency, COUNT(d.aid) AS total')
      ->leftJoin('c.ACompetencies d')
      ->leftJoin('c.Translation t')
      ->where('t.lang = ?', $this->getUser()->getCulture())      
	  ->groupBy('c.competency_id, t.competency')
      ->execute();    
  }
  	
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('aid');
    $this->alumni = Doctrine_Core::getTable('Alumni')->find(array($index));
	$this->forward404Unless($this->alumni);
    
	$this->a_competencies = Doctrine_Core::getTable('ACompetencies')
		->createQuery('d')
		->leftJoin('d.Alumni p')
		->leftJoin('d.Competency c')
		->leftJoin('c.Translation t')
		->where('t.lang = ?', $this->getUser()->getCulture())		
		->where('d.aid = ?', $index)
		->execute();
		
	$this->aid = $index;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->a_row = Doctrine_Core::getTable('ACompetencies')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->a_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->aid = $request->getParameter('aid');
	$this->forward404Unless($this->aid);

    $this->form = new ACompetenciesForm();
    $this->form->setDefault('aid', $this->aid); 
  }

  public function executeEdit(sfWebRequest $request)
  {
    $a_competencies = $this->forward404UnlessExist($request);
    $this->form = new ACompetenciesForm($a_competencies);
  }

  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'ACompetencies', 'ACompetenciesForm', 
		'acompetencies/filter', 'did', 'a_competencies');
  }
}
