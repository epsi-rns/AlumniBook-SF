<?php

/**
 * JobTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JobTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object JobTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('JobType');
    }
    
	public function retrieveBackendJobType(Doctrine_Query $q)
	{
		$r = $q->getRootAlias(); 
		$q->where($r.'.job_type_id > 1');
		return $q;
	}
}