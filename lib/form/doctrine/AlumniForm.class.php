<?php

/**
 * Alumni form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AlumniForm extends BaseAlumniForm
{
  public function configure()
  {
    $years = range(1945, 1995);
    $years_list = array_combine($years, $years);

    $this->widgetSchema['birthdate'] = new sfWidgetFormDate(array(
      'label' => 'Data:',
      'years' => $years_list
    )); 

    $this->widgetSchema['gender'] = new sfWidgetFormChoice(array(
		'choices' => Alumni::getGenderChoices(),
		'expanded' => true
    ));
    
    unset(
      $this['created_at'], $this['updated_at'], $this['fullname']
    );
    
    $this->getWidgetSchema()->moveField('note', sfWidgetFormSchema::LAST);
  }
  
}
