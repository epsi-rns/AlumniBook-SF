<?php

/**
 * Community filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class CommunityBrowseFormFilter extends BaseCommunityFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		1  => 'ID',
		10  => 'Members Count',
		'' => '----------',
		80 => 'Community',		
		82 => 'Department',
		83 => 'Faculty',
		84 => 'Program'
	);			
		
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();

    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

    $this->widgetSchema['department_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));
	
	$choice_query = Doctrine::getTable('Faculty')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.faculty_id');    

	$this->widgetSchema['faculty_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => 'Faculty', 'query' => $choice_query, 'add_empty' => '-- all faculties --' ) );

    $this->useFields(array(
		'department_id', 'faculty_id', 'program_id', 'order_by'
	));
	
    $query = Doctrine_Core::getTable('Community')
      ->createQuery('c')      
      ->select('count(ac.cid) as total, '
        .'c.cid, c.community, c.brief, c.type_id, '
		.'f.faculty_id, tf.faculty, '
		.'d.department_id, td.department, '
		.'p.program_id, tp.program')
      ->leftJoin('c.ACommunities ac')
      ->leftJoin('c.Faculty f')
      ->leftJoin('f.Translation tf')->andWhere('tf.lang = ?', $this->lang)
      ->leftJoin('c.Department d')
      ->leftJoin('d.Translation td')->andWhere('td.lang = ?', $this->lang)
      ->leftJoin('c.Program p')
      ->leftJoin('p.Translation tp')->andWhere('tp.lang = ?', $this->lang)
      ->groupBy('c.cid');

	$this->setQuery($query);  
  }
  
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		1  => 'c.cid',
		10  => 'count(ac.cid) desc',

		80 => 'c.community',
		82 => 'c.department_id, c.program_id',
		83 => 'c.faculty_id, c.department_id, c.program_id',
		84 => 'c.program_id, c.department_id',
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );		
  }
}
