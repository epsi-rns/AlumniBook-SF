<?php

/**
 * Department filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class DepartmentFormFilter extends BaseDepartmentFormFilter
{
  public function configure()
  {
	$query_fcly = Doctrine::getTable('Faculty')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.faculty_id');
    $this->widgetSchema['faculty_id']    = new sfWidgetFormDoctrineChoice(
		array(
			'model' => $this->getRelatedModelName('Faculty'), 
			'query' => $query_fcly, 
			'add_empty' => '-- all faculties --' )
	);		  
  }
}
