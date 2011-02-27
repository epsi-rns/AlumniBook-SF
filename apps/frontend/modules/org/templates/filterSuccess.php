<?php 
	$attr_new  = array('class' => 'icon_new');
	
	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array() 
	));	
	
	include_component('org', 'show', array(
		'rows' => $organizations, 
		'order_by' => $order_by
	));
	
	include_partial('global/pager', array('pager' => $pager));
  
