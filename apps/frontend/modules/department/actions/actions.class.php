<?php

/**
 * department actions.
 *
 * @package    alumni
 * @subpackage department
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class departmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->lang = $this->getUser()->getCulture();
	
    $this->faculties = Doctrine_Core::getTable('Faculty')  
      ->createQuery('f')
      ->orderBy('f.faculty_id')
      ->leftJoin('f.Translation t')
      ->where('t.lang = ?', $this->lang)      
      ->execute();
  }
}
