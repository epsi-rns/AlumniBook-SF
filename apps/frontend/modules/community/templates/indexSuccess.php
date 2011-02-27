<?php 
	$attr_new  = array('class' => 'icon_new');	

	include_partial('global/dynamic_dropdown', array(
		'formFilter' => $formFilter, 'route' => 'ajax/dept',
		'master' => 'faculty_id', 'detail' => 'department_id'
	));	

	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'orderFields' => array('order_by'),
		'filterFields' => array(
			'program_id', 'faculty_id', 'department_id')
	));	
	
	include_component('community', 'show', array(
		'rows' => $communities, 
		'order_by' => $order_by
	));
	
	include_partial('global/pager', array('pager' => $pager)); 
	echo link_to(__('New'), 'community/new', $attr_new);
