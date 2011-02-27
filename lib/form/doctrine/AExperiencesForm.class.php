<?php

/**
 * AExperiences form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AExperiencesForm extends BaseAExperiencesForm
{
  public function configure()
  {    
	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
  }
}
