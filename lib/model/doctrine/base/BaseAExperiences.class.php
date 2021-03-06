<?php

/**
 * BaseAExperiences
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $did
 * @property integer $aid
 * @property string $organization
 * @property string $description
 * @property string $job_position
 * @property integer $year_in
 * @property integer $year_out
 * @property Alumni $Alumni
 * 
 * @method integer      getDid()          Returns the current record's "did" value
 * @method integer      getAid()          Returns the current record's "aid" value
 * @method string       getOrganization() Returns the current record's "organization" value
 * @method string       getDescription()  Returns the current record's "description" value
 * @method string       getJobPosition()  Returns the current record's "job_position" value
 * @method integer      getYearIn()       Returns the current record's "year_in" value
 * @method integer      getYearOut()      Returns the current record's "year_out" value
 * @method Alumni       getAlumni()       Returns the current record's "Alumni" value
 * @method AExperiences setDid()          Sets the current record's "did" value
 * @method AExperiences setAid()          Sets the current record's "aid" value
 * @method AExperiences setOrganization() Sets the current record's "organization" value
 * @method AExperiences setDescription()  Sets the current record's "description" value
 * @method AExperiences setJobPosition()  Sets the current record's "job_position" value
 * @method AExperiences setYearIn()       Sets the current record's "year_in" value
 * @method AExperiences setYearOut()      Sets the current record's "year_out" value
 * @method AExperiences setAlumni()       Sets the current record's "Alumni" value
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAExperiences extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_experiences');
        $this->hasColumn('did', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('aid', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('organization', 'string', 35, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 35,
             ));
        $this->hasColumn('description', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('job_position', 'string', 35, array(
             'type' => 'string',
             'length' => 35,
             ));
        $this->hasColumn('year_in', 'integer', 2, array(
             'type' => 'integer',
             'range' => 
             array(
              0 => 1964,
              1 => 2015,
             ),
             'length' => 2,
             ));
        $this->hasColumn('year_out', 'integer', 2, array(
             'type' => 'integer',
             'range' => 
             array(
              0 => 1964,
              1 => 2015,
             ),
             'length' => 2,
             ));


        $this->setAttribute(Doctrine_Core::ATTR_VALIDATE, true);
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Alumni', array(
             'local' => 'aid',
             'foreign' => 'aid',
             'onDelete' => 'Cascade'));
    }
}