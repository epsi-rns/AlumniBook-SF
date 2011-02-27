<?php

/**
 * JobType form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class JobTypeForm extends BaseJobTypeForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
    $this->widgetSchema->setLabels( self::$all_languages ); 
    $this->widgetSchema['en']['job_type']->setLabel('Occupation');
    $this->widgetSchema['id']['job_type']->setLabel('Pekerjaan');
  }
}
