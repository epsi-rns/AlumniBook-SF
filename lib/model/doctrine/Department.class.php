<?php

/**
 * Department
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class Department extends BaseDepartment
{
	public function __toString()
	{
		return sprintf('%s', $this->get('department'));
	}
}
