<?php

/**
 * Department form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class DepartmentForm extends BaseDepartmentForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
    $this->widgetSchema->setLabels( self::$all_languages ); 
    
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
