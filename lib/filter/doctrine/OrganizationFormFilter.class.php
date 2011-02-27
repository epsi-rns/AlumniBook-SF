<?php

/**
 * Organization filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OrganizationFormFilter extends BaseOrganizationFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		3  => 'ID',
		25 => 'Organization/ Company',
		11 => 'Created Time',
		12 => 'Updated Time'
	);
			
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();

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
        
    $this->useFields(array(
		'order_by', 'name', 'update_st', 'update_nd'
	));
	
    $query = Doctrine_Core::getTable('Organization')
      ->createQuery('o');
	$this->setQuery($query);
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		3  => 'o.org_id',
		25 => 'o.Name',
		11 => 'o.created_at',
		12 => 'o.updated_at'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }
  
  /* Manage Data Entry Filter Fields	*/
  public function addNameColumnQuery(Doctrine_Query $query, $field, $values) 
  { 
	if ( !empty($values['text']) ) 
	{
		$driver = Doctrine_Manager::getInstance()
			->getCurrentConnection()->getDriverName();
	  
		if	($driver=='Mysql')
			$query->andWhere('LOWER(o.name) LIKE ?', strtolower($values['text'])); 
		else	
			$query->andWhere('o.name LIKE ?', $values['text']); 
	}	
  }	

  public function addUpdateStColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('o.updated_at >= ?', $values); }

  public function addUpdateNdColumnQuery(Doctrine_Query $query, $field, $values) 
	{ if (!empty($values) ) $query->andWhere('o.updated_at <= ?', $values); }
}
