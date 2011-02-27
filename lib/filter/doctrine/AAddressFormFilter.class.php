<?php

/**
 * AAddress filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AAddressFormFilter extends BaseAAddressFormFilter
{
  /**
   * @see AddressFormFilter
   */

	static protected $order_by_choices = array(
		null => '',
		6  => 'ID',
		21 => 'Name (Alumna/us)',
		'' => '----------',
		60 => 'Address', 
		61 => 'Region',
		63 => 'Code: Country', 
		64 => 'Code: Province', 
		65 => 'Code: District',
		66 => 'Postal Code', 
		67 => 'Street', 
		68 => 'Area', 
		69 => 'Building'
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
	
    $query = Doctrine_Core::getTable('AAddress')
      ->createQuery('r')
      ->leftJoin('r.Country n')
      ->leftJoin('r.Province p')
      ->leftJoin('r.District w')
      ->leftJoin('r.Alumni a')
	  ->leftJoin('a.ACommunities ac');
	$this->setQuery($query);
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		6  => 'r.lid',
		21 => 'a.name',
		60 => 'r.address',
		61 => 'r.region',
		63 => 'r.country_id',
		64 => 'r.province_id', 
		65 => 'r.district_id',
		66 => 'r.postal_code',
		67 => 'r.street',
		68 => 'r.area',
		69 => 'r.building'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }
  
  /* This parts needs Trait in PHP 5.4 */
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
