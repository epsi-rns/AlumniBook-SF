<?php

/**
 * CommunityFrontend form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class CommunityFrontendForm extends BaseCommunityForm
{
  public function configure()
  {
	$query_fcly = Doctrine::getTable('Faculty')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.faculty_id');
		
	$query_prog = Doctrine::getTable('Program')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.program_id');	  
	  
    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));
    $this->widgetSchema['faculty_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Faculty', 'query' => $query_fcly, 
		'add_empty' => '-- all faculties --' ));
    $this->widgetSchema['program_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Program', 'query' => $query_prog, 
		'add_empty' =>  '-- all programs --' ));
	
	  
	$this->getWidgetSchema()->moveField('department_id', 
		sfWidgetFormSchema::AFTER, 'faculty_id');	  
  }
}
