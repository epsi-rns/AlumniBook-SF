<?php

/**
 * Alumni modal filter form.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class AlumniModalFormFilter extends BaseAlumniFormFilter
{	
  public function configure()
  {
	$this->widgetSchema->setFormFormatterName('list');	
    $this->disableCSRFProtection();
    
    $this->widgetSchema['name']->setLabel('Name Containing');    
    $this->useFields(array('name'));
  }
  
  /* Manage Data Entry Filter Fields	*/
  public function addNameColumnQuery(Doctrine_Query $query, $field, $values) 
  { 
	if ( !empty($values['text']) ) 
	{
		$text = '%'.$values['text'].'%';
		$driver = Doctrine_Manager::getInstance()
			->getCurrentConnection()->getDriverName();
	  
		if	($driver=='Mysql')
			$query->andWhere('LOWER(name) LIKE ?', strtolower($text)); 
		else	
			$query->andWhere('name LIKE ?', $text); 
	}	
  }	
}
