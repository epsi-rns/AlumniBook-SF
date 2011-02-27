<?php

/**
 * Alumni filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AlumniFormFilter extends BaseAlumniFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		1  => 'ID',
		24 => 'Name',

		11 => 'Created Time',
		12 => 'Updated Time',
		
		'' => '----------',
		111 => 'Community',
		112 => 'Department',
		113 => 'Faculty',
		114 => 'Program',
		115 => 'Class of (year)'
	);
	
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->addAllCommunityFields($this);
    $this->widgetSchema['name']->setLabel('Name Like %');
        
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

    $this->widgetSchema['update_st'] = new sfWidgetFormDatePicker(
		array('theme'=>'dashboard'));
    $this->widgetSchema['update_st']->setLabel('Update (start) Range');
    $this->validatorSchema['update_st'] = new sfValidatorPass(); 

    $this->widgetSchema['update_nd'] = new sfWidgetFormDatePicker(
		array('theme'=>'dashboard'));
    $this->widgetSchema['update_nd']->setLabel('Update (end) Range');
    $this->validatorSchema['update_nd'] = new sfValidatorPass(); 
    
    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));

    $this->useFields(array(
		'department_id', 'faculty_id', 'program_id', 'class_year', 
		'order_by', 'name', 'update_st', 'update_nd'
	));
	
    $query = Doctrine_Core::getTable('Alumni')
      ->createQuery('a')
      ->select('a.*, ac.*, c.community')
	  ->leftJoin('a.ACommunities ac')
	  ->leftJoin('ac.Community c');
	  
	$this->setQuery($query);
  }
  
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {
	$order_by_choices = array(
		1  => 'a.aid',
		24 => 'a.name',
		
		11 => 'a.created_at',
		12 => 'a.updated_at',
		
		111 => 'ac.community, a.name',
		112 => 'ac.department_id, ac.program_id, ac.class_year, a.name',
		113 => 'ac.faculty_id, ac.department_id, ac.program_id, ac.class_year, a.Name',
		114 => 'ac.program_id, ac.department_id, ac.class_year, a.name',
		115 => 'ac.class_year, ac.department_id, a.name'	// default
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );

	$codes = array('department' => 112, 'faculty' => 113, 'program' => 114);
	$this->addSelectCommunityFields($query, $values, $codes);	
  }
  
  /* This parts might needs Trait in PHP 5.4 */
  public function addDepartmentIdColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('ac.department_id = ?', $values); }  
	
  public function addFacultyIdColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('ac.faculty_id = ?', $values); }  

  public function addProgramIdColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('ac.program_id = ?', $values); } 

  public function addClassYearColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values['text']) ) $query->andWhere('ac.class_year = ?', $values['text']); }
	
  /* Manage Data Entry Filter Fields	*/
  public function addNameColumnQuery(Doctrine_Query $query, $field, $values) 
  { 
	if ( !empty($values['text']) ) 
	{
		$driver = Doctrine_Manager::getInstance()
			->getCurrentConnection()->getDriverName();
	  
		if	($driver=='Mysql')
			$query->andWhere('LOWER(a.name) LIKE ?', strtolower($values['text'])); 
		else	
			$query->andWhere('a.name LIKE ?', $values['text']); 
	}	
  }	

  public function addUpdateStColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('a.updated_at >= ?', $values); }

  public function addUpdateNdColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('a.updated_at <= ?', $values); }

}
