<?php

/**
 * sfActionsExtCRUD general base class for frontend actions
 * This class might needs Trait in PHP 5.4
 *
 * @package    alumni
 * @subpackage actions
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
abstract class sfActionsExtCRUD extends sfActionsExt
{
  /* Properties: initialization of variable for non template 
   * CRUD Actions (Create, Update, Delete) */	
  
  protected
    $tableName	= null,
    $formName	= null,
    $deletedRouteName = null,
    $id_name	= null,
    $obj_name	= null;
    
  public function preExecute()
  {
	$this->setupCRUD();
  }    
   
  abstract protected function setupCRUD();
  /* Fill it with below, look at the sample
  {
    initPropCRUD( , , , , )
  }
  */
  
  protected function initPropCRUD(
	$tableName, $formName, $deletedRouteName, 
	$id_name, $obj_name)
  {
	$this->tableName = $tableName;
	$this->formName	= $formName;
	$this->deletedRouteName = $deletedRouteName;
	$this->id_name	= $id_name;
	$this->obj_name	= $obj_name;
  }

  /* Real Actions: non template 
   * CRUD Actions (Create, Update, Delete) */	
   
  public function executeCreate(sfWebRequest $request)
	{ $this->_executeCreate($request, $this->formName); }

  public function executeUpdate(sfWebRequest $request)
	{ $this->_executeUpdate($request, $this->formName); }
   
  public function executeDelete(sfWebRequest $request)
	{ $this->_executeDelete($request, $this->deletedRouteName); }
	
  protected function processForm(sfWebRequest $request, sfForm $form)
	{ $this->_processForm($request, $form, $this->id_name);  }
	
  protected function forward404UnlessExist(sfWebRequest $request)  
  {	
	return $this->_forward404UnlessExist(
		$this->tableName, $this->id_name, $this->obj_name);
  }	
  
  /* Prototype: non template 
   * CRUD Actions (Create, Update, Delete) */

  private function _executeCreate(sfWebRequest $request, $formClass_name)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new $formClass_name();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  private function _executeUpdate(sfWebRequest $request, $formClass_name)
  {
    $this->forward404Unless(
		$request->isMethod(sfRequest::POST) || 
		$request->isMethod(sfRequest::PUT));
    $obj_result = $this->forward404UnlessExist($request);
    $this->form = new $formClass_name($obj_result);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }  
  
  private function _executeDelete(sfWebRequest $request, $route)
  {
    $request->checkCSRFProtection();

    $obj_result = $this->forward404UnlessExist($request);
    $obj_result->delete();

	$this->getUser()->setFlash('info', 'Deleted successfully'); 
    $this->redirect($route);
  }
  
  
  protected function _processForm(
	sfWebRequest $request, sfForm $form, $id_name, $id_param = null)
  {
	if (empty($id_param)) $id_param = $id_name;
	$module = $request->getParameter('module');
	
    $form->bind(
		$request->getParameter($form->getName()), 
		$request->getFiles($form->getName())
	);
	
    if ($form->isValid())
    {
      $obj_result = $form->save();
	  $this->getUser()->setFlash('notice', 'Saved successfully');  
      $this->redirect($module.'/edit?'.$id_param.'='.$obj_result->get($id_name));
    }
  }  
  
  /* Custom Method: Additional Helper */
    
  private function _forward404UnlessExist($tableName, $id_name, $obj_name)
  {	
	$request = $this->getRequest();
	  
	$message = 'Object '.$obj_name.' does not exist (%s).';
	$index = $request->getParameter($id_name);
	$this->forward404Unless($index);

	$row = Doctrine_Core::getTable($tableName)->find(array($index));
	$this->forward404Unless($row, sprintf($message, $index));

	return $row;
  }  	  
}
