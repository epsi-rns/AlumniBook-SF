<?php

/**
 * OFields form.
 *
 * @package    alumni
 * @subpackage form
 * @author     E.R. Nurwijayadi
 * @version    1.0
 */
class OFieldsForm extends BaseOFieldsForm
{
  public function configure()
  {    
	$this->widgetSchema['org_id'] = new sfWidgetFormInputHidden();

	$choice_query = Doctrine::getTable('BizField')
		->createQuery('r')
		->leftJoin('r.Translation t')
		->orderBy('r.biz_field_id');    

	$this->widgetSchema['biz_field_id'] = new sfWidgetFormDoctrineChoice(
		array('model' => 'BizField', 'add_empty' => '--Select Business Field--', 
			'query' =>$choice_query));
	$this->validatorSchema['biz_field_id'] = new sfValidatorDoctrineChoice(
		array('model' => 'BizField', 'column' => 'biz_field_id'));    
    $this->widgetSchema['biz_field_id']->setLabel('Business Field');	
  }
}
