<?php

/**
 * JobPosition form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class JobPositionForm extends BaseJobPositionForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
    $this->widgetSchema->setLabels( self::$all_languages ); 
    $this->widgetSchema['en']['job_position']->setLabel('Job Position');
    $this->widgetSchema['id']['job_position']->setLabel('Jabatan');
  }
}
