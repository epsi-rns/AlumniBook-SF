<?php 
	if	(isset($form))
	{
		$obj = $form->getObject();
		$id  = (int) $obj->get($master);
		$val = (int) $obj->get($detail);
		$formName = $form->getName(); 
	}
	elseif	(isset($formFilter))
	{
		$id  = (int) $formFilter->getValue($master);
		$val = (int) $formFilter->getValue($detail);
		$formName = $formFilter->getName(); 
	}
	
	if	(!empty($formName)):
		$url_init = url_for($route.'?name='.$formName.'&id='.$id.'&val='.$val);
?>
<script type="text/javascript">
	window.addEvent("domready",function(){	
		var el_master = document.id('<?php echo $formName.'_'.$master;?>');
		var el_detail = document.id('<?php echo $formName.'_'.$detail;?>');
		
		var el_container = new Element('div', {id: 'el_container'});
		el_container.wraps(el_detail);
		
		el_master.addEvent('change', function() {	
			id = el_master.get('value');
			if (id=='') id = 0; // fix
			url_detail = '<?php echo url_for($route); ?>'
				+ '/name/<?php echo $formName; ?>'
				+ '/id/'+id
				+ '/val/<?php echo $val; ?>';
			bindInnerRequest(url_detail, 'el_container');
		});		
		
		url_init = '<?php echo $url_init; ?>';
		bindInnerRequest(url_init, 'el_container');			
	});
</script>
<?php endif; ?>
