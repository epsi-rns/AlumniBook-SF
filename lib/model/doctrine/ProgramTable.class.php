<?php

/**
 * ProgramTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProgramTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProgramTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Program');
    }
    
	public function retrieveBackendProgram(Doctrine_Query $q)
	{
		$r = $q->getRootAlias(); 
		$q
			->where($r.'.program_id > 0')
			->leftJoin($r.'.Translation t');
		return $q;
	}
}
