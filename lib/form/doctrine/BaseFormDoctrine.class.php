<?php

/**
 * Project form base class.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  static protected 
	$all_languages = array('en'=>'English', 'id'=> 'Bahasa Indonesia');
  
  public function setup()  
  {
  }
}
