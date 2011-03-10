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
    $this->widgetSchema['competency_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => $this->getRelatedModelName('Competency'), 'add_empty' => '--Select Competency--'));
  }
}
