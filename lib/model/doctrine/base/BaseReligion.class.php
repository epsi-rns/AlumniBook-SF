<?php

/**
 * BaseReligion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $religion_id
 * @property string $religion
 * @property Doctrine_Collection $Alumni
 * 
 * @method integer             getReligionId()  Returns the current record's "religion_id" value
 * @method string              getReligion()    Returns the current record's "religion" value
 * @method Doctrine_Collection getAlumni()      Returns the current record's "Alumni" collection
 * @method Religion            setReligionId()  Sets the current record's "religion_id" value
 * @method Religion            setReligion()    Sets the current record's "religion" value
 * @method Religion            setAlumni()      Sets the current record's "Alumni" collection
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReligion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('religion');
        $this->hasColumn('religion_id', 'integer', 1, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 1,
             ));
        $this->hasColumn('religion', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Alumni', array(
             'local' => 'religion_id',
             'foreign' => 'religion_id'));
    }
}