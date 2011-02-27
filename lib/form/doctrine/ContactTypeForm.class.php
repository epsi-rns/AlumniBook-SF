<?php

/**
 * ContactType form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ContactTypeForm extends BaseContactTypeForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
	$this->widgetSchema->setLabels( self::$all_languages ); 
  }
}
