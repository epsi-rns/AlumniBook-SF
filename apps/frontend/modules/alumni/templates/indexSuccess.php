<?php 
	$attr_new  = array('class' => 'icon_new');
	
	use_stylesheets_for_form($formFilter);
	use_javascripts_for_form($formFilter);

	include_partial('global/dynamic_dropdown', array(
		'formFilter' => $formFilter, 'route' => 'ajax/dept',
		'master' => 'faculty_id', 'detail' => 'department_id'
	));	
	
	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'orderFields' => array('order_by'),
		'filterFields' => array(
			'name', 'update_st', 'update_nd',
			'program_id', 'faculty_id', 'department_id', 'class_year') 
	));	
	
	
	include_component('alumni', 'show', array(
		'rows' => $alumni, 
		'order_by' => $order_by
	));	

	include_partial('global/pager', array('pager' => $pager));
	echo link_to(__('New'), 'alumni/new', $attr_new);
