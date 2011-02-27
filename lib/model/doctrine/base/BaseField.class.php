<?php

/**
 * BaseField
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $field_id
 * @property string $field
 * @property clob $description
 * @property Doctrine_Collection $OFields
 * 
 * @method integer             getFieldId()     Returns the current record's "field_id" value
 * @method string              getField()       Returns the current record's "field" value
 * @method clob                getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getOFields()     Returns the current record's "OFields" collection
 * @method Field               setFieldId()     Sets the current record's "field_id" value
 * @method Field               setField()       Sets the current record's "field" value
 * @method Field               setDescription() Sets the current record's "description" value
 * @method Field               setOFields()     Sets the current record's "OFields" collection
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseField extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('field');
        $this->hasColumn('field_id', 'integer', 1, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 1,
             ));
        $this->hasColumn('field', 'string', 35, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 35,
             ));
        $this->hasColumn('description', 'clob', 65535, array(
             'type' => 'clob',
             'length' => 65535,
             ));

        $this->option('type', 'MyISAM');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('OFields', array(
             'local' => 'field_id',
             'foreign' => 'field_id'));
    }
}