<?php

/**
 * ACommunities filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ACommunitiesFormFilter extends BaseACommunitiesFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		1  => 'ID',
		21 => 'Name',
		'' => '----------',
		81 => 'Community',		
		82 => 'Department',
		83 => 'Faculty',
		84 => 'Program',
		85 => 'Class of (year)'
	);			
		
  public function configure()
  {
	// http://erisds.co.uk/symfony/snippet-symfony-forms-setting-the-form-formatter
	// http://bluehorn.co.nz/2009/08/31/symfony-12-sfform-formatter-to-add-stars-on-required-fields/
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    	
	// http://www.michelsalib.com/2010/10/how-to-use-filters-on-custom-fields/
	$this->widgetSchema['decade'] = new sfWidgetFormChoice(array(
		'choices' => self::$decade_choices));
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));
				
    $this->validatorSchema['decade'] = new sfValidatorPass();  
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

	// avoid heavy queries  
	  
	$query_fcly = Doctrine::getTable('Faculty')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.faculty_id');
		
	$query_prog = Doctrine::getTable('Program')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.program_id');
		
    $this->widgetSchema['faculty_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Faculty', 'query' => $query_fcly, 'add_empty' => '-- all faculties --' ));
    $this->widgetSchema['program_id']    = new sfWidgetFormDoctrineChoice(
		array('model' => 'Program', 'query' => $query_prog, 'add_empty' =>  '-- all programs --' ));

    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));
	
	$this->widgetSchema['class_year']->setLabel('Class of (year)');	

    $this->useFields(array(
		'department_id', 'faculty_id', 'program_id',
		'class_year', 'decade', 'order_by'
	));
	
  }
  
  public function addDecadeColumnQuery(Doctrine_Query $query, $field, $values) 
  {
	$decades = array(1960, 1970, 1980, 1990, 2000, 2010);
    if ( in_array( $values, $decades ) )
    {
      $query->andWhere('class_year >= ?', $values);
      $query->andWhere('class_year <= ?', $values+9);
    }    
  }
}
 
