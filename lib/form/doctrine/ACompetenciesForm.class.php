<?php

/**
 * ACompetencies form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class ACompetenciesForm extends BaseACompetenciesForm
{
  public function configure()
  {    
	$this->widgetSchema['aid'] = new sfWidgetFormInputHidden();
  }
}
