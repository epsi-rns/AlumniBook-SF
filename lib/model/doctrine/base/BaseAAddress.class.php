<?php

/**
 * BaseAAddress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Alumni $Alumni
 * 
 * @method Alumni   getAlumni() Returns the current record's "Alumni" value
 * @method AAddress setAlumni() Sets the current record's "Alumni" value
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAAddress extends Address
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Alumni', array(
             'local' => 'lid',
             'foreign' => 'aid',
             'onDelete' => 'CASCADE'));
    }
}