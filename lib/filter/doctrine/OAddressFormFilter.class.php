<?php

/**
 * OAddress filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OAddressFormFilter extends BaseOAddressFormFilter
{
  /**
   * @see AddressFormFilter
   */

	static protected $order_by_choices = array(
		null => '',
		6  => 'ID',
		23 => 'Name (Organization/ Company)',
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
    
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 
        
    $this->useFields(array(
		'order_by'
	));
	
    $query = Doctrine_Core::getTable('OAddress')
      ->createQuery('r')
      ->leftJoin('r.Country n')
      ->leftJoin('r.Province p')
      ->leftJoin('r.District w')
      ->leftJoin('r.Organization o');
	$this->setQuery($query);

  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		6  => 'r.lid',
		23 => 'o.name',
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
}
