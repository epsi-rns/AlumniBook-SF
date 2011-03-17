<?php

/**
 * Community form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class CommunityForm extends BaseCommunityForm
{
  public function configure()
  {
    $this->widgetSchema['type_id'] = new sfWidgetFormChoice(array(
		'choices' => Community::getTypeIdChoices(),
		'expanded' => true
    ));	  	  
  }
}
