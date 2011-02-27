<?php

/**
 * BizField form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi <epsi.rns@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BizFieldForm extends BaseBizFieldForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'id'));
    $this->widgetSchema->setLabels( self::$all_languages ); 
    $this->widgetSchema['en']['biz_field']->setLabel('Business Field');
    $this->widgetSchema['id']['biz_field']->setLabel('Bidang Usaha');
  }
}
