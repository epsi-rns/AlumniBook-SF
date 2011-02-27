<?php	extract($sf_data->getRaw('params')); ?>
<div id="dw-sidebar-menu">
	<ul>
	<?php if(isset($id_pagetop)): ?>
		<li><a href="#<?php echo $id_pagetop; ?>" 
		id="dw-sidebar-menu-top" 
		title="Top of Page">Top of Page</a></li>
	<?php endif; ?>
		<li><a href="<?php echo url_for(@homepage); ?>" 
		id="dw-sidebar-menu-home" 
		title="Go to the Homepage">Homepage</a></li>
	<?php if(isset($route_tweets)): ?>	
		<li><a href="<?php echo url_for($route_tweets); ?>"
		id="dw-sidebar-menu-twitter"  
		title="Share on Twitter">Read Tweets</a></li>
	<?php endif; ?>
	<?php if(isset($id_pagebottom)): ?>
		<li><a href="#<?php echo $id_pagebottom; ?>" 
		id="dw-sidebar-menu-bottom"
		title="Bottom of Page">Bottom of Page</a></li>
	<?php endif; ?>
	</ul>
</div>
