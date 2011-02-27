<?php

/**
 * BaseACertifications
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $did
 * @property integer $aid
 * @property string $certification
 * @property string $institution
 * @property Alumni $Alumni
 * 
 * @method integer         getDid()           Returns the current record's "did" value
 * @method integer         getAid()           Returns the current record's "aid" value
 * @method string          getCertification() Returns the current record's "certification" value
 * @method string          getInstitution()   Returns the current record's "institution" value
 * @method Alumni          getAlumni()        Returns the current record's "Alumni" value
 * @method ACertifications setDid()           Sets the current record's "did" value
 * @method ACertifications setAid()           Sets the current record's "aid" value
 * @method ACertifications setCertification() Sets the current record's "certification" value
 * @method ACertifications setInstitution()   Sets the current record's "institution" value
 * @method ACertifications setAlumni()        Sets the current record's "Alumni" value
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseACertifications extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_certifications');
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
        $this->hasColumn('certification', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('institution', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
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