<?php 
	include_partial('global/dynamic_dropdown', array(
		'formFilter' => $formFilter, 'route' => 'ajax/dept',
		'master' => 'faculty_id', 'detail' => 'department_id'
	));	

	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array('job_position_id', 
			'program_id', 'faculty_id', 'department_id', 
			'class_year', 'decade'),
		'routeName' => '@omap_filter'
	));	
	
	include_component('omap', 'show', array(
		'rows' => $ao_maps, 
		'order_by' => $order_by
	));	

	include_partial('global/pager', array(
		'pager' => $pager, 'routeName' => '@omap_filter'));
