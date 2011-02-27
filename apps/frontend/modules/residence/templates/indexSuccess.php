<?php 
	include_partial('global/dynamic_dropdown', array(
		'formFilter' => $formFilter, 'route' => 'ajax/dept',
		'master' => 'faculty_id', 'detail' => 'department_id'
	));	

	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array(
			'program_id', 'faculty_id', 'department_id', 
			'class_year', 'decade')
	));	
	
	include_component('residence', 'show', array(
		'rows' => $address, 
		'order_by' => $order_by
	));	

	include_partial('global/pager', array('pager' => $pager));
