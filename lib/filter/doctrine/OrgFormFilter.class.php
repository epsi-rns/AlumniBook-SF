<?php

/**
 * Organization filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OrgFormFilter extends BaseOrganizationFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		3  => 'ID',
		25 => 'Organization/ Company',
		30 => 'Product',
	);
			
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 
        
    $this->useFields(array(
		'order_by'
	));
	
    $query = Doctrine_Core::getTable('Organization')
      ->createQuery('r');
	$this->setQuery($query);	
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		3  => 'r.org_id',
		25 => 'r.Name',
		30 => 'r.product'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }
}
