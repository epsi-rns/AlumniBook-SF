<?php 
	$attr_new  = array('class' => 'icon_new');
	
	use_stylesheets_for_form($formFilter);
	use_javascripts_for_form($formFilter);

	include_partial('global/filter', array(
		'formFilter'	=> $formFilter,
		'orderFields'	=> array('order_by'),
		'filterFields'	=> array('name', 'update_st', 'update_nd') 
	));	
	
	include_component('org', 'show', array(
		'rows' => $organizations, 
		'order_by' => $order_by
	));
	
	include_partial('global/pager', array('pager' => $pager));
	echo link_to(__('New'), 'org/new', $attr_new);
  
