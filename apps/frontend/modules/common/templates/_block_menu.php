<?php use_helper('CommonUrl'); ?>

<div class="moduletable_menu">
<h3><?php echo __('Start Page'); ?></h3>
	<ul class="menu"><li>
		<?php echo link_to(__('Home'), 'cover/index'); ?>		
	</li></ul>
	
	<ul class="menu"><li>
		<?php echo link_to(__('About'), 'cover/about'); ?>		
	
		<ul class="menu"><li>
			<?php echo link_to(__('Screenshot'), 'cover/screenshot'); ?>		
		</li></ul>		

		<?php if ($sf_user->hasCredential('admin')): ?>
		<ul class="menu"><li>
			<?php echo link_to(__('Developer News'), 'cover/devnews'); ?>		
		</li></ul>
		<?php endif; ?>	
	</li></ul>
</div>

<?php
	$action = $sf_request->getParameter('action');	
	$disallowed = array('list', 'show', 'new', 'edit');
	if (! in_array($action, $disallowed) ):
?>
<script type="text/javascript">
	target = '<?php echo url_for('common/menu'); ?>';
	bindInnerRequest(target, 'book_menu');
</script>
<?php endif; ?>

<div id="book_menu"></div>

<?php if ($sf_user->isAuthenticated()): ?>
<div class="moduletable_menu">
<h3><?php echo __('Users'); ?></h3>
	<ul class="menu"><li>
		<?php echo link_to(('Administrator'),
			baseurl_for('backend', true)); ?>
	</li></ul>			
	
	<ul class="menu"><li>
		<?php echo link_to(__('Logout'), 'sfGuardAuth/signout'); ?>		
	</li></ul>
</div>
<?php endif; ?>
		
