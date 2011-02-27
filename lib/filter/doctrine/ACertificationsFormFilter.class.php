<?php

/**
 * ACertifications filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ACertificationsFormFilter extends BaseACertificationsFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		1  => 'ID',
		21 => 'Name',
		41 => 'Sertifikasi',
		42 => 'Institusi',
		'' => '----------',
		101 => 'Community',		
		102 => 'Department',
		103 => 'Faculty',
		104 => 'Program',
		105 => 'Class of (year)'
	);
			
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->addAllCommunityFields($this);
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));

    $this->useFields(array(
		'department_id', 'faculty_id', 'program_id',
		'class_year', 'decade', 'order_by'
	));
	
    $query = Doctrine_Core::getTable('ACertifications')
      ->createQuery('r')
      ->select('a.name, r.certification, r.institution, ac.*')
      ->leftJoin('r.Alumni a')
	  ->leftJoin('a.ACommunities ac');
	$this->setQuery($query);   
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		1  => 'r.did',
		21 => 'a.Name',
		41 => 'r.certification',
		42 => 'r.institution',
		101 => 'ac.community, a.Name',
		102 => 'ac.department_id, ac.program_id, ac.class_year, a.Name',
		103 => 'ac.faculty_id, ac.department_id, ac.program_id, ac.class_year, a.Name',
		104 => 'ac.program_id, ac.department_id, ac.class_year, a.Name',
		105 => 'ac.class_year, ac.department_id, a.Name'	// default
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
		
	$codes = array('department' => 102, 'faculty' => 103, 'program' => 104);
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
	
  public function addDecadeColumnQuery(Doctrine_Query $query, $field, $values) 
  {
	$decades = array(1960, 1970, 1980, 1990, 2000, 2010);
    if ( in_array( $values, $decades ) )
    {
      $query->andWhere('ac.class_year >= ?', $values);
      $query->andWhere('ac.class_year <= ?', $values+9);
    }    
  }   
}



