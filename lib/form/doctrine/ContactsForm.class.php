<?php

/**
 * Contacts form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ContactsForm extends BaseContactsForm
{
  public function configure()
  {
	$this->widgetSchema['lid'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['link_type'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['ct_id']->setLabel('Contact Type');
  }
}
