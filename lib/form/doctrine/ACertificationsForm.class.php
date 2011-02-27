<?php

/**
 * ACertifications form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ACertificationsForm extends BaseACertificationsForm
{
  public function configure()
  {    
	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
  }
}
