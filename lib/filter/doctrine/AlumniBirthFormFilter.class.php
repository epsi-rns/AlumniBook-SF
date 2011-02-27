<?php

/**
 * Alumni filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AlumniBirthFormFilter extends BaseAlumniFormFilter
{
	static protected $months_choices = array(
		null => '',
		1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 
		5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 
		9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember' 
	);
		
	static protected $order_by_choices = array(
		null => '',
		1  => 'ID',
		24 => 'Name',
		
		73  => 'Date: Birthdate', 
		74  => 'Date: Day', 
		75  => 'Date: Month', 
		76  => 'Date: Year', 
		77  => 'Date: Weekday',

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
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

	$this->widgetSchema['decade'] = new sfWidgetFormChoice(array(
		'choices' => self::$decade_choices));	
    $this->validatorSchema['decade'] = new sfValidatorPass();  
    
	$this->widgetSchema['month_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$months_choices));
    $this->validatorSchema['month_by'] = new sfValidatorPass();  
    $this->widgetSchema['month_by']->setLabel('Month of Birth');

    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));

    $this->useFields(array(
		'month_by',
		'department_id', 'faculty_id', 'program_id',
		'class_year', 'decade', 'order_by'		
	));
	
	// Warning: mySQL specific
    $query = Doctrine_Core::getTable('Alumni')
      ->createQuery('a')
      ->select('a.aid, a.name, a.fullname, '
        .'a.gender, a.created_at, a.birthdate, '
		.'WEEKDAY(a.birthdate) as a_weekday, '
		.'DAYOFMONTH(a.birthdate) as a_day, '
		.'MONTH(a.birthdate) as a_month, '
		.'YEAR(a.birthdate) as a_year, '
		.'ac.*'
		)
	  ->leftJoin('a.ACommunities ac')
      ->andWhere('a.birthdate is not null');

	// Firebird Style:
	// EXTRACT(WEEKDAY FROM A.BirthDate) AS Hari, EXTRACT(MONTH FROM A.BirthDate) AS Bulan
	// EXTRACT(DAY FROM A.BirthDate) AS Tanggal, EXTRACT(YEAR FROM A.BirthDate) AS Tahun
	  
	$this->setQuery($query);
  }
  
  public function addMonthByColumnQuery(Doctrine_Query $query, $field, $values) 
  {
	// using alias a_month generate error
	// Column not found: 1054 Unknown column 'a__2' in 'where clause'
	if (!empty($values) ) 
		$query->andWhere('MONTH(a.birthdate) = ?', $values);
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {
	$order_by_choices = array(
		1  => 'a.aid',
		24 => 'a.name',

		73  => 'a.birthdate', 
		74  => 'a_day, a.name', 
		75  => 'a_month, a_day, a.name', 
		76  => 'a_year, a_month, a_day, a.name', 
		77  => 'a_weekday, a_month, a_day, a.name',

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
