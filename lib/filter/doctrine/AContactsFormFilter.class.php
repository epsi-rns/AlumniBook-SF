<?php

/**
 * AContacts filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AContactsFormFilter extends BaseAContactsFormFilter
{
  /**
   * @see ContactsFormFilter
   */
   
	static protected $order_by_choices = array(
		null => '',
		6  => 'ID',
		21 => 'Name (Alumna/us)',
		47 => 'Contact Type'
	);
			
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    $this->addAllCommunityFields($this);
        
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

	$this->widgetSchema['ct_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => 'ContactType', 'add_empty' => true));
	$this->validatorSchema['ct_id'] = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'ContactType', 'column' => 'ct_id'));    
    $this->widgetSchema['ct_id']->setLabel('Contact Type');

    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));

    $this->useFields(array(
		'ct_id',
		'department_id', 'faculty_id', 'program_id',
		'class_year', 'decade', 'order_by'	
	));
	
    $query = Doctrine_Core::getTable('AContacts')
      ->createQuery('r')
      ->leftJoin('r.ContactType ct')
      ->leftJoin('r.Alumni a')
	  ->leftJoin('a.ACommunities ac');
	$this->setQuery($query);
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		6  => 'r.lid',
		21 => 'a.Name',
		47 => 'r.ct_id'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
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
