<?php

/**
 * Address form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AddressForm extends BaseAddressForm
{
  public function configure()
  {
	$this->widgetSchema['lid'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['link_type'] = new sfWidgetFormInputHidden();
    unset(
      $this['address'], $this['region']
    );

    $this->widgetSchema['district_id'] = new sfWidgetFormChoice(array(
		'choices' => array(null => '')
	));
  }
  
  public function isValid()
  {
	$sf_user = sfContext::getInstance()->getUser();
	extract($this->values);

	if (! ($area || $building || $street) )
	{
		$sf_user->setFlash('error', 'Address is empty.'); 
		return false;
	}

	if ($country_id==null && $province_id==null && $district_id==null && !$postal_code)
	{
		$sf_user->setFlash('error', 'Region is empty.'); 
		return false;
	}		

    return parent::isValid();
  }  
}
