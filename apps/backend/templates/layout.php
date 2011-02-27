<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Preloaded data and base category</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div class="sfadmin"><div id="container">
	<?php if ($sf_user->isAuthenticated()) 
			include_partial('global/top_menu');
	?>

      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
    </div></div>
  </body>
</html>
