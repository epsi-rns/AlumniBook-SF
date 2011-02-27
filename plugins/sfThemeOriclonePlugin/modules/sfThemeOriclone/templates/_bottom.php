<?php
	$blocks = isset($blocks)? $sf_data->getRaw('blocks') : array();
	foreach (array('bottom', 'user1', 'user2') as $block)
		$$block	= isset($blocks[$block]) ? $blocks[$block] : false;
	
	$cur_year	= $year= date('Y',time());
	
	$top_layout = 'pos_col'.(1+(bool)$user1+(bool)$user2);
	$top_layout = 'pos_col1';
?>
	<?php if ($bottom || $user1 || $user2) : ?>
	<div id="lay_top" class="no-print <?php echo $top_layout;?>"><div class="fixed">
	
		<div id="lay_top_left">
			<?php echo $bottom; ?>
		</div>
		
		<?php if ($user2) : ?>
		<div id="lay_top_right">
			<?php echo $user2; ?>
		</div>
		<?php endif; ?>
		
		<?php if ($user1) : ?>
		<div id="lay_top_center">
			<?php echo $user1; ?>
		</div>	
		<?php endif; ?>
		
		<div class="clr"></div>	
	</div></div>
	<?php endif; ?>

	<div id="lay_footer">
		<div id="footer">&#x00bb; &nbsp;
		<?php echo link_to(__('Full Feed'), 'main/feed.atom', 
			array('class' => 'icon_feed')); ?>,		
		<?php echo __('Copyright'); ?> &copy; <?php echo $cur_year;?>,
		<a href="https://github.com/epsi/AlumniBook-SF">AlumniBook</a>
		&nbsp; &#x00ab;</div>
	</div>
	
	<div class="no-print">
	</div>
