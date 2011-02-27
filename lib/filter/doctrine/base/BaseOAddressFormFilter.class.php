<?php

/**
 * OAddress filter form base class.
 *
 * @package    alumni
 * @subpackage filter
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOAddressFormFilter extends AddressFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('o_address_filters[%s]');
  }

  public function getModelName()
  {
    return 'OAddress';
  }
}
