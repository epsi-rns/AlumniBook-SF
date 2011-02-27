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
}
