<?php

/**
 * OContacts filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OContactsFormFilter extends BaseOContactsFormFilter
{
  /**
   * @see ContactsFormFilter
   */

	static protected $order_by_choices = array(
		null => '',
		6  => 'ID',
		23 => 'Name (Organization/ Company)',
		47 => 'Contact Type'
	);
			
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

	$this->widgetSchema['ct_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => 'ContactType', 'add_empty' => true));
	$this->validatorSchema['ct_id'] = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'ContactType', 'column' => 'ct_id'));    
    $this->widgetSchema['ct_id']->setLabel('Contact Type');
            
    $this->useFields(array(
		'ct_id',
		'order_by'
	));
	
    $query = Doctrine_Core::getTable('OContacts')
      ->createQuery('r')      
      ->leftJoin('r.ContactType ct')
      ->leftJoin('r.Organization o');
	$this->setQuery($query);
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		6  => 'r.lid',
		23 => 'o.name',
		47 => 'r.ct_id'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }
}
