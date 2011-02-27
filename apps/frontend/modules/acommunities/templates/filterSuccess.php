<?php 
	include_partial('global/dynamic_dropdown', array(
		'formFilter' => $formFilter, 'route' => 'ajax/dept',
		'master' => 'faculty_id', 'detail' => 'department_id'
	));	

	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'orderFields' => array('order_by'),
		'filterFields' => array(
			'program_id', 'faculty_id', 'department_id', 
			'class_year', 'decade')
	));	

	if (isset($link))
		include_partial('summary', array(
			'rows' => $summary, 'link' => $sf_data->getRaw('link')));

	include_component('acommunities', 'show', array(
		'rows' => $a_communities, 
		'order_by' => $order_by
	));

	include_partial('global/pager', 
		array('pager' => $pager, 'routeName' => $uri)); ?>

