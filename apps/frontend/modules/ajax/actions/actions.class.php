<?php

/**
 * ajax actions.
 *
 * @package    alumni
 * @subpackage ajax
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ajaxActions extends sfActionsAlumni
{
  public function preExecute()
  {
    // The code inserted here is executed at the beginning of each action call
	sfConfig::set('sf_web_debug', false);	
  }

  public function executeAlumni(sfWebRequest $request)  
  { 
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;

	$index = $request->getParameter('id');
	$this->forwardUnless($index, 'cover', 'index');

	$this->one = Doctrine_Core::getTable('Alumni')
		->find(array($index));
    $this->forward404Unless($this->one);
    
    $this->communities = Doctrine_Core::getTable('ACommunities')
		->findByDql('aid = ?', $index);
		
	$this->competencies = Doctrine_Core::getTable('ACompetencies')
		->findByDql('aid = ?', $index);	
		
	$this->certifications = Doctrine_Core::getTable('ACertifications')
		->findByDql('aid = ?', $index);	
	
	$this->experiences = Doctrine_Core::getTable('AExperiences')
		->findByDql('aid = ?', $index);		
		
	$this->residences = Doctrine_Core::getTable('AAddress')
		->findByDql('lid = ?', $index);		
		
	$this->acontacts = Doctrine_Core::getTable('AContacts')
		->findByDql('lid = ?', $index);	
  }
  
  public function executeAlumniOrg(sfWebRequest $request)  
  {
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;
	
	$index = $request->getParameter('id');
	$this->forwardUnless($index, 'cover', 'index');	
	
	$this->map = Doctrine_Core::getTable('AOMap')
		->find(array($index));
    $this->forward404Unless($this->map);	

	$oid = $this->map->getOrgId();
	$this->offices = Doctrine_Core::getTable('OAddress')
		->findByDql('lid = ?', $oid);	
	$this->ocontacts = Doctrine_Core::getTable('OContacts')
		->findByDql('lid = ?', $oid);	
		
	$mid = $this->map->getMid();
	$this->workplaces = Doctrine_Core::getTable('MAddress')
		->findByDql('lid = ?', $mid);	
	$this->mcontacts = Doctrine_Core::getTable('MContacts')
		->findByDql('lid = ?', $mid);	
  }  

  public function executeOrg(sfWebRequest $request)  
  { 
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;
		  
	$index = $request->getParameter('id');
	$this->forwardUnless($index, 'cover', 'index');
		
	$this->one = Doctrine_Core::getTable('Organization')
		->find(array($index));
    $this->forward404Unless($this->one);
    
    $this->fields = Doctrine_Core::getTable('OFields')
		->findByDql('org_id = ?', $index);
		
	$this->offices = Doctrine_Core::getTable('OAddress')
		->findByDql('lid = ?', $index);		
		
	$this->ocontacts = Doctrine_Core::getTable('OContacts')
		->findByDql('lid = ?', $index);	
  }
  
  public function executeOrgAlumni(sfWebRequest $request)  
  { 
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;
	
	$index = $request->getParameter('id');
	$this->forwardUnless($index, 'cover', 'index');	
	
	$this->map = Doctrine_Core::getTable('AOMap')
		->find(array($index));
    $this->forward404Unless($this->map);	

	$aid = $this->map->getAid();
	$this->residences = Doctrine_Core::getTable('AAddress')
		->findByDql('lid = ?', $aid);	
	$this->acontacts = Doctrine_Core::getTable('AContacts')
		->findByDql('lid = ?', $aid);			
    $this->communities = Doctrine_Core::getTable('ACommunities')
		->findByDql('aid = ?', $aid);
  }  
  
  // Format: module/action?name=formName&id=id&val=val
  public function executeDept(sfWebRequest $request)  
  { 
	if (!$this->request->isXmlHttpRequest()) return sfView::NONE;

	$formName = $request->getParameter('name');
	if (!$formName) return sfView::NONE;

	$index = $request->getParameter('id');
	$value = $request->getParameter('val');
	
	if (!empty($index))
		$all = '-- all departments in this faculty --';
	else
		$all = '-- please select faculty first --';
		
	$query = Doctrine_Core::getTable('Department')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->where('t.lang = ?', $this->getUser()->getCulture())		
		->andWhere('r.faculty_id = ?', $index)
		->orWhere('r.faculty_id = -1');

	$w = new sfWidgetFormDoctrineChoice(array(
		'model' => 'Department', 'query' => $query,	'add_empty' => $all
	), array('class'=>'required'));

	$select = $w->render($formName.'[department_id]', $value, array());

	$this->renderText($select);
	return sfView::NONE;
  }

  // Test: frontend_dev.php/ajax/District/name/m_address/id/12/val/146 
  public function executeDistrict(sfWebRequest $request)  
  { 
	 if (!$this->request->isXmlHttpRequest()) return sfView::NONE;
	 
	$formName = $request->getParameter('name');
	if (!$formName) return sfView::NONE;	 

	$index = $request->getParameter('id');
	$value = $request->getParameter('val');
		
	$query = Doctrine_Core::getTable('District')
      ->createQuery('r')	
      ->where('r.province_id = ?', $index);

	$w = new sfWidgetFormDoctrineChoice(array(
		'model' => 'District', 'query' => $query, 
		'add_empty' => '-- all districts in this province--'
	));

	$select = $w->render($formName.'[district_id]', $value, array());

	$this->renderText($select);
	return sfView::NONE;
  } 
}
