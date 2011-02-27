<script type="text/javascript">
	target = '<?php echo url_for('ajax/alumni?id='.$aid); ?>';
	bindInnerRequest(target, 'AlumnaID');
	
	<?php foreach ($maps as $map): $mid = $map->get('mid'); ?>	
	target = '<?php echo url_for('ajax/alumniOrg?id='.$mid); ?>';
	bindInnerRequest(target, 'MID-<?php echo $mid; ?>');	
	<?php endforeach; ?>
</script>  

<?php 
	$k=1;
	$editor = ($sf_user->hasCredential('editor')); 
	$attr = array('class' => 'icon_edit');
?>
	    <table align="center" border="0">
	      <tr><td>
		<!-- Begin Document -->
		
<div class="sheet">
	<h4><?php echo $one->getFullname() ?></h4>
	<?php 
	if ($editor)
		echo link_to(__('edit'), 'alumni/show?'
			.'aid='.$one->get('aid'), $attr);
      ?>
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tbody id="AlumnaID"></tbody>
		
		<?php foreach ($maps as $map): ?>
		<tbody>  
	    <tr class="sectiontableentry1"
		title="Lihat detail dari organisasi ini">
	      <td vAlign="top"><?php echo __('Organization'); ?></td>

	      <td id="MID-<?php echo $map->get('mid'); ?>"></td>
	    </tr>
<?php $k = 1 - $k; 
			endforeach; ?>
		</tbody>  
		</table>
</div>

		<!-- End Document --> 
	      </td></tr>
	    </table>
