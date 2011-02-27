<?php if ($sf_user->isAuthenticated()): ?>
You are browsing the Alumni Book demo website. 
Feel free to play with it as the database is reset every day, daily, every 24 hours. 
<?php else: ?>
You can login with one of these username/password pairs:
editor/editor (frontend), guest/guest (frontend) or admin/admin (backend).
<?php endif; ?>

<div style="float: right; padding-right: 20px; ">
<?php echo link_to(
	image_tag('cultures/en.gif', array(
		'alt' => 'English', 
		'title' => 'English (United Kingdom)', 
		'border' => '0')), 
	'common/language?lang=en'
	); ?>
&nbsp;
<?php echo link_to(
	image_tag('cultures/id.gif', array(
		'alt' => 'Indonesia', 
		'title' => 'Bahasa Indonesia (Indonesia)',
		'border' => '0')),  
	'common/language?lang=id'
	); ?>
</div>	
