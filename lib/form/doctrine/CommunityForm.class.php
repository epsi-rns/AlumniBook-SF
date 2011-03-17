<?php

/**
 * Community form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class CommunityForm extends BaseCommunityForm
{
  public function configure()
  {
	// avoid heavy queries  
	  
	$query_dept = Doctrine::getTable('Department')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.department_id');

	$query_fcly = Doctrine::getTable('Faculty')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.faculty_id');
		
	$query_prog = Doctrine::getTable('Program')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.program_id');
		
	$this->widgetSchema['department_id'] = new sfWidgetFormDoctrineChoice(
		array(
			'model' => $this->getRelatedModelName('Department'), 
			'query' => $query_dept, 
			'add_empty' => '-- all departments --' ));
    $this->widgetSchema['faculty_id']    = new sfWidgetFormDoctrineChoice(
		array(
			'model' => $this->getRelatedModelName('Faculty'), 
			'query' => $query_fcly, 
			'add_empty' => '-- all faculties --' ));
    $this->widgetSchema['program_id']    = new sfWidgetFormDoctrineChoice(
		array(
			'model' => $this->getRelatedModelName('Program'), 
			'query' => $query_prog, 
			'add_empty' =>  '-- all programs --' ));
	  
    $this->widgetSchema['type_id'] = new sfWidgetFormChoice(array(
		'choices' => Community::getTypeIdChoices(),
		'expanded' => true
    ));	  	  
  }
}
