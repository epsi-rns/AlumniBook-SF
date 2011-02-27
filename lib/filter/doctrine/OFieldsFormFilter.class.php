<?php

/**
 * OFields filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OFieldsFormFilter extends BaseOFieldsFormFilter
{
	static protected $order_by_choices = array(
		null => '',
		3  => 'ID',
		23 => 'Organization/ Company',
		30 => 'Product',
		46 => 'Business Field'
	);
			
  public function configure()
  { 
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->widgetSchema['order_by'] = new sfWidgetFormChoice(array(
		'choices' => self::$order_by_choices));    
    $this->validatorSchema['order_by'] = new sfValidatorPass(); 

	$choice_query = Doctrine::getTable('BizField')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.biz_field_id');    

	$this->widgetSchema['biz_field_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => 'BizField', 'add_empty' => true, 'query' => $choice_query));
	$this->validatorSchema['biz_field_id'] = new sfValidatorDoctrineChoice(
		array('required' => false, 'model' => 'BizField', 'column' => 'biz_field_id'));    
    $this->widgetSchema['biz_field_id']->setLabel('Business Field');
        
    $this->useFields(array(
		'biz_field_id', 'order_by'
	));
	
    $query = Doctrine_Core::getTable('OFields')
      ->createQuery('r')
      ->select('o.*, f.biz_field_id, t.*, r.description')
      ->leftJoin('r.Organization o')
      ->leftJoin('r.BizField f')
      ->leftJoin('f.Translation t')
      ->where('t.lang = ?', $this->lang);
      
	$this->setQuery($query);		
  }
    
  public function addOrderByColumnQuery(Doctrine_Query $query, $field, $values) 
  {	 
	$order_by_choices = array(
		3  => 'r.org_id',
		23 => 'o.Name',
		30 => 'o.product, r.biz_field_id, o.Name',
		46 => 'r.biz_field_id, o.Name'
	);

    if ( array_key_exists($values, $order_by_choices) )
		$query->orderBy( $order_by_choices[$values] );
  }
}
