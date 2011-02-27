<?php 
	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array('biz_field_id') 
	));	
	
	include_component('ofields', 'show', array(
		'rows' => $o_fields, 
		'order_by' => $order_by
	));	

	include_partial('global/pager', array('pager' => $pager));
