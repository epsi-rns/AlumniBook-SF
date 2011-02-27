<script type="text/javascript">
	target = '<?php echo url_for('ajax/org?id='.$org_id); ?>';
	bindInnerRequest(target, 'OrganizationID');
	
	<?php foreach ($maps as $map): $mid = $map->get('mid'); ?>	
	target = '<?php echo url_for('ajax/orgAlumni?id='.$mid); ?>';
	bindInnerRequest(target, 'MID-<?php echo $mid; ?>');	
	<?php endforeach; ?>
</script>

<?php 
	use_helper('ItemOrg'); 
	$item = new item_org();
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
		echo link_to(__('edit'), 'org/show?'
			.'org_id='.$one->get('org_id'), $attr);
       ?>
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tbody id="OrganizationID"></tbody>
		
		<?php foreach ($maps as $map): ?>
		<tbody>
	    <tr class="sectiontableentry1"
		title="Lihat detail dari alumna/us ini">
	      <td vAlign="top"><?php echo __('Alumni'); ?></td>

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
