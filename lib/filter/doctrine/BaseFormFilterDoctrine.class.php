<?php

/**
 * Project filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */

abstract class BaseFormFilterDoctrine extends sfFormFilterDoctrine
{
  protected $lang = null;
  	
  public function setup()
  {
	// http://webmozarts.com/2009/07/01/why-sfcontextgetinstance-is-bad/
	$sf_user = sfContext::getInstance()->getUser();
	$this->lang = $sf_user->getCulture();
  }

  static protected $decade_choices = array(
	null =>  '-- all classes --',
	'1960' => '196x',
	'1970' => '197x',
	'1980' => '198x',
	'1990' => '199x',
	'2000' => '200x',
	'2010' => '201x'
  );	
	
  protected function addAllCommunityFields()
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
		array('model' => 'Department', 'query' => $query_dept, 'add_empty' => '-- all departments --' ));
    $this->widgetSchema['faculty_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Faculty', 'query' => $query_fcly, 'add_empty' => '-- all faculties --' ));
    $this->widgetSchema['program_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Program', 'query' => $query_prog, 'add_empty' =>  '-- all programs --' ));
    $this->widgetSchema['class_year']      = new sfWidgetFormFilterInput(
		array('with_empty' => false));
    $this->widgetSchema['decade'] = new sfWidgetFormChoice(array(
		'choices' => self::$decade_choices));
	$this->widgetSchema['class_year']->setLabel('Class of (year)');	
				
	$this->validatorSchema['department_id'] = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'Department', 'column' => 'department_id'));
	$this->validatorSchema['faculty_id']    = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'Faculty', 'column' => 'faculty_id'));
	$this->validatorSchema['program_id']    = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'Program', 'column' => 'program_id'));         
	$this->validatorSchema['class_year']      = new sfValidatorSchemaFilter(
		'text', new sfValidatorInteger(array('required' => false)));
    $this->validatorSchema['decade'] = new sfValidatorPass(); 
  }

  protected function addSelectCommunityFields($query, $values, array $codes)
  {  
	switch ($values) 
	{	// reduce expensive queries
		case $codes['department']: $query
			->addSelect('td.department, d.department_id')
			->leftJoin('ac.Department d')
			->leftJoin('d.Translation td')
			->andWhere('td.lang = ?', $this->lang);
			break;
		case $codes['faculty']: $query
			->addSelect('tf.faculty, f.faculty_id')
			->leftJoin('ac.Faculty f') 
			->leftJoin('f.Translation tf')
			->andWhere('tf.lang = ?', $this->lang);
			break;
		case $codes['program']: $query
			->addSelect('tp.program, p.program_id')
			->leftJoin('ac.Program p') 
			->leftJoin('p.Translation tp')
			->andWhere('tp.lang = ?', $this->lang);
			break;
	}	
  }	  
}


