<?php

/**
 * JobType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class JobType extends BaseJobType
{
  public function __toString()
  {
    return sprintf('%s', $this->get('job_type'));
	}
	
	public function preDelete($event)
	{
		$id = $this->get('job_type_id');
		if ($id<=1)
			$event->skipOperation();
	}
}
