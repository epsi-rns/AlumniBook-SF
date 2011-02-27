<?php
	if (!isset($routeName))
	{
		$module = $sf_request->getParameter('module');
		$action = $sf_request->getParameter('action');		
		$routeName = $module.'/'.$action;
	}
	
	$formName = $formFilter->getName(); 
	
	if	(isset($filterFields))
		// Or use cast instead for escaped values: (array) $filterFields
		$filterFieldsRaw = $sf_data->getRaw('filterFields');
	else
		$filterFieldsRaw = array();
?>

<?php 
	if (in_array('class_year', $filterFieldsRaw) 
	&&	in_array('decade', $filterFieldsRaw) ): ?>
<script type="text/javascript">
window.addEvent('domready', function() {
	var deca = document.id('<?php echo $formName; ?>_decade');
	var year = document.id('<?php echo $formName; ?>_class_year');
	
	deca.addEvent('change', function(){	year.set('value', ''); 	});
	year.addEvent('change', function(){	deca.set('value', '');	});
});
</script>
<?php endif; ?>

<div class="sheet_filter">
  <form action="<?php echo url_for($routeName) 
	?>" method="post" id="<?php echo $formName; ?>">

	<?php if(isset($groupFields)): ?>	
	<?php if($groupFields->count()): ?>
	<fieldset title="<?php echo __('Group Display'); ?>">
		<legend><?php echo __('Grouping:'); ?></legend>
		<?php foreach($groupFields as $field) 
				echo $formFilter[$field]->renderRow(); 
		?>
	</fieldset>	
	<?php endif; endif; ?>
	
	<?php if(isset($orderFields)): ?>	
	<?php if($orderFields->count()): ?>
	<fieldset title="<?php echo __('Sort Display'); ?>">
		<legend><?php echo __('Ordering:'); ?></legend>
		<?php foreach($orderFields as $field) 
				echo $formFilter[$field]->renderRow(); 
		?>
	</fieldset>	
	<?php endif; endif; ?>

	<?php if(isset($filterFields)): ?>
	<?php if($filterFields->count()): ?>
	<fieldset title="<?php echo __('Filter Display'); ?>">
		<legend><?php echo __('Filter:'); ?></legend>			
		<?php foreach($filterFields as $field) 
				echo $formFilter[$field]->renderRow(); 
		?>
	</fieldset>
	<?php endif; endif; ?>

	<input type="submit" value="<?php echo __('Apply'); ?>"/>
	<?php echo link_to(__('Reset'), $routeName, array(), 
		array('query_string' => '_reset', 'method' => 'post')) ?>		
  </form> 
</div>  

<br/>
