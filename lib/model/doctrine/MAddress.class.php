<?php

/**
 * MAddress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    alumni
 * @subpackage model
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class MAddress extends BaseMAddress
{    
}

$mAddressTable = Doctrine_Core::getTable('MAddress');
$mAddressTable->addRecordListener(new AddressHydrationListener());
