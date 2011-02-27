<?php 
	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'orderFields' => array('order_by'),
		'filterFields' => array('ct_id') 
	));	

	include_component('ocontacts', 'show', array(
		'rows' => $contacts, 
		'order_by' => $order_by
	));	
	
	include_partial('global/pager', array('pager' => $pager));
