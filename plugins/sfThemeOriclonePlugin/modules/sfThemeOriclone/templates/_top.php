<?php
	$blocks = isset($blocks)? $sf_data->getRaw('blocks') : array();
	foreach (array('user3', 'user4', 'menumatic', 'top') as $block)
		$$block	= isset($blocks[$block]) ? $blocks[$block] : false;
?>
	<div id="lay_header"><div class="fixed" id="lay_header_container">
		<?php if (!empty($logo)) : ?>
		<div class="logo" id="<?php echo $logo; ?>"></div>
		<?php endif; ?>
		
		<div id="lay_header_left">
			<?php echo $sitename; ?>
		</div>		
		
		<?php if ($user3 || $user4) : ?>
		<div id="lay_header_right">	
			<?php if ($user4) : ?>
			<div id="tabsearch"> 
				<div id="tabmenu_left"></div>				
				<div id="tabmenu_center">
					<?php echo $user4; ?>
				</div>				
				<div id="tabmenu_right"></div>				
			</div>   			
			<div class="clr"></div>   
			<?php endif; ?>
			
			<?php if ($user3) : ?>
			<div id="tabmenu"> 
				<div id="tabmenu_right"></div>
				<div id="tabmenu_center">
					<?php echo $user3; ?>
				</div>				
				<div id="tabmenu_left"></div>
			</div>   
			<div class="clr"></div>			
			<?php endif; ?>
		</div>	
		<?php endif; ?>
	</div></div>
	
	<?php if ($menumatic) : ?>
	<div id="menumaticwrap">	
		<?php echo $menumatic; ?>
	<div>
	<div class="clr"></div>	
	<?php endif; ?>		

	<div id="lay_top">
	<?php if ($top) : ?>
	<div class="fixed">
		<?php echo $top; ?>
	</div>
	<?php endif; ?>
	</div>
