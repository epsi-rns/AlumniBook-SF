<?php 	
	function left_menu_module($text, $mod)
	{
		?>
	<ul class="menu"><li>
		<?php echo link_to($text, $mod); ?>		
	</li></ul>
		<?php
	}
?>

<script type="text/javascript">
	window.addEvent('domready', function() {
		hover_sidemenu();
	});
</script>

<div class="moduletable_menu">
<h3><?php echo __('Community Summary'); ?></h3>
	<?php left_menu_module(__('Community'), 'community/index'); ?>
	<?php left_menu_module(__('Total Chart'), 'acommunities/total'); ?>
	<?php left_menu_module(__('All Departments'), 'department/index'); ?>
</div>

<?php if ($sf_user->hasCredential('editor')): ?>
<div class="moduletable_menu">
<h3><?php echo __('Manage Data'); ?></h3>
	<?php left_menu_module(__('Add Alumna/us'), 'alumni/new'); ?>
	<?php left_menu_module(__('Add Organization'), 'org/new'); ?>
	<?php left_menu_module(__('Manage Alumni'), 'alumni/index'); ?>
	<?php left_menu_module(__('Manage Organization'), 'org/index'); ?>
</div>
<?php endif; ?>	

<?php if ($sf_user->isAuthenticated()): ?>
<div class="moduletable_menu">
<h3><?php echo __('Browse Alumni'); ?></h3>
	<?php left_menu_module(__('Alumni'), 'acommunities/filter'); ?>
	<?php left_menu_module(__('Birthday'), '@birth'); ?>
	<?php left_menu_module(__('Competencies'), 'acompetencies/category'); ?>
	<?php left_menu_module(__('Certifications'), 'acertifications/index'); ?>	
	<?php left_menu_module(__('Academic Degrees'), 'adegrees/index'); ?>
	<?php left_menu_module(__('Experiences'), 'aexperiences/index');  ?>
</div>

<div class="moduletable_menu">
<h3><?php echo __('Browse Organizations'); ?></h3>
	<?php left_menu_module(__('Organizations/ Companies'), 'org/filter'); ?>
	<?php left_menu_module(__('Business Fields'), 'ofields/category'); ?>
</div>

<div class="moduletable_menu">
<h3><?php echo __('Browse Mapping'); ?></h3>
	<?php left_menu_module(__('Occupation'), 'amap/category'); ?>
	<?php left_menu_module(__('Job Position'), 'omap/category'); ?>
</div>
<?php endif; ?>


