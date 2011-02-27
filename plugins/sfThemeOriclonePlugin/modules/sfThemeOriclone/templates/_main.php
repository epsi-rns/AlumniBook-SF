<?php
	$sf_content = $sf_data->getRaw('sf_content');

	$blocks = isset($blocks)? $sf_data->getRaw('blocks') : array();
	$allowed = array('left', 'right', 'index_top', 'index_bottom', 'main_bottom');
	foreach ($allowed as $block)
		$$block	= isset($blocks[$block]) ? $blocks[$block] : false;	

	// Main Layout	
	$layout = 'lcr';
	$isindex = ($sf_request->getPathInfo() == '/');
	
	if (!$left)		$layout = str_replace('l', '', $layout);	
	if (!$right)	$layout = str_replace('r', '', $layout);
	
	$show_left	= $left		&& (strpos($layout, 'l')!==false);
	$show_right	= $right	&& (strpos($layout, 'r')!==false);
	
	$flip_leftright = ($layout=='rlc') || ($layout=='clr');	
	$main_layout = 'pos_'.$layout;
	
	// Not a breadcrumbs 
	$title = get_slot('title');
	if	(empty($title))
		$title = sfContext::getInstance()->getResponse()->getTitle();
?>

	<div id="lay_main" class="<?php echo $main_layout;?>"><div class="fixed">
		<?php if ($flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<?php echo $right; ?>
		</div>	
		<?php endif; ?>
		<?php endif; ?>

 		<?php if ($show_left) : ?>
		<div id="lay_left">
			<?php echo $left; ?>
		</div>
		<?php endif; ?>
	
		<?php if (!$flip_leftright) : ?>
		<?php if ($show_right) : ?>
		<div id="lay_right">
			<?php echo $right; ?>
		</div>	
		<?php endif; ?>
		<?php endif; ?>
	
		<div id="lay_content">
			<?php if (!empty($title)) : ?>
			<div id="gloss"><div class="breadcrumbs">
				<strong><?php echo __('Home'); ?></strong>
				&nbsp; &#x00bb; &nbsp; <?php echo $title; ?>
			</div></div>
			<?php endif; ?>
			
			<div id="system-message">
<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php elseif ($sf_user->hasFlash('error')): ?>
	<div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php elseif ($sf_user->hasFlash('info')): ?>
	<div class="flash_info"><?php echo $sf_user->getFlash('info') ?></div>
<?php endif ?>
			</div>
			<div id="main_content" class="main_content">  
				<?php if ($isindex && $index_top)
						echo $index_top; ?>

				<?php echo $sf_content; ?>
				
				<?php if ($isindex && $index_bottom)
						echo $index_bottom; ?>
			</div>
		</div>
	
		<div class="clr"></div>

		<?php if ($main_bottom): ?>
		<div id="lay_bottom">
			<?php echo $main_bottom; ?>
		</div>
		<?php endif; ?>
	
	</div></div>

