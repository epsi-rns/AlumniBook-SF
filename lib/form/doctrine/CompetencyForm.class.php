<?php

/**
 * Competency form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class CompetencyForm extends BaseCompetencyForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
    $this->widgetSchema->setLabels( self::$all_languages ); 
  }
}
