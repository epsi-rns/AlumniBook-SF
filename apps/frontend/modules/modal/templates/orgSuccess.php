<script type="text/javascript">
	window.addEvent('domready', function() {
		$$('.pick').addEvent('click', function(){
			window.parent.el_lookup.set('value', this.get('id'));
			window.parent.el_text.set('value', this.get('text'));
			window.parent.diabox.hide();
		});
	});
</script>

<?php
	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'filterFields' => array('name')
	));
?>

<div class="sheet">
<table title="Click organization to pick!">
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Name'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($org as $i => $row): ?>
    <tr class="<?php echo (($i % 2) ? 'even' : 'odd'); ?>">
      <td><?php echo $i+1 ?></td>
      <td><a href="#" class="pick" id="<?php 
		echo $row->get('org_id'); ?>"><?php 
		echo $row->get('name') ;
		?></a></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php	include_partial('global/pager', array('pager' => $pager));
