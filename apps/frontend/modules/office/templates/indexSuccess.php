<?php 
	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array() 
	));	
	
	include_component('office', 'show', array(
		'rows' => $address, 
		'order_by' => $order_by
	));	

	include_partial('global/pager', array('pager' => $pager));
