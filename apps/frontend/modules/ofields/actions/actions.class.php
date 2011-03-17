<?php

/**
 * ofields actions.
 *
 * @package    alumni
 * @subpackage ofields
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ofieldsActions extends sfActionsExtCRUD
{
  public function executeCategory(sfWebRequest $request)
  {
    $this->cats = Doctrine_Core::getTable('BizField')
      ->createQuery('f')      
      ->select('f.biz_field_id, t.biz_field, COUNT(d.org_id) AS total')
      ->leftJoin('f.OFields d')
      ->leftJoin('f.Translation t')
      ->where('t.lang = ?', $this->getUser()->getCulture())
	  ->groupBy('f.biz_field_id, t.biz_field')
      ->execute();    
  }
  
  public function executeList(sfWebRequest $request)
  {
	$index = $request->getParameter('oid');
    $this->org = Doctrine_Core::getTable('Organization')->find(array($index));
	$this->forward404Unless($this->org);
    
	$this->o_fields = Doctrine_Core::getTable('OFields')
		->createQuery('r')
		->leftJoin('r.Organization o')
		->leftJoin('r.BizField f')
		->leftJoin('f.Translation t')
		->where('t.lang = ?', $this->getUser()->getCulture())		
		->where('r.org_id = ?', $index)
		->execute();
		
	$this->org_id = $index;
  }  

  public function executeShow(sfWebRequest $request)
  {
    $this->o_row = Doctrine_Core::getTable('OFields')
		->find(array($request->getParameter('did')));
    $this->forward404Unless($this->o_row);
  }

  public function executeNew(sfWebRequest $request)
  {
	$org_id = $request->getParameter('oid');
	$this->forward404Unless($org_id);

    $this->form = new OFieldsForm();
    $this->form->setDefault('org_id', $org_id);
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $o_fields = $this->forward404UnlessExist($request);
    $this->form = new OFieldsForm($o_fields);
  }
  
  protected function setupCRUD()
  {
	  $this->initPropCRUD(
		'OFields', 'OFieldsForm', 
		'ofields/filter', 'did', 'o_fields');
  }
}
