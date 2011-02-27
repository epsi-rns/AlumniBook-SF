<?php 
	/** initial design and code by: Epsi Nurwijayadi **/ 
	
	// helper groups
	use_helper('setOricloneOptions');
	use_helper('docType');
	
	$sf_content = $sf_data->getRaw('sf_content');
	extract(sfConfig::get('app_oriclone_error'));

	setOricloneStyleSheets($css);
	$classes = getOricloneStyleClasses($classes);
	initOricloneAssetsError($debug_css, $effects);	
		
	// DocType
	$lang = $sf_user->getCulture();
	echo doc_type('XHTML 1.0 Strict');
	echo xml_version($lang);
?>
<head>
	<?php if($code=='404'): ?><title>404 - Error: 404</title><?php endif;?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
	<script type="text/javascript">
		window.addEvent('domready', function() { mootools_shake(); });
  	</script>    
</head>

<body class="<?php echo $classes;?>">
<div id="wrapper">
	<a name="top" id="top"></a>
	
	<div id="lay_header"><div class="fixed" id="lay_header_container">		
		<div id="continfo"><div id="errorinfo">		
			<?php if($code=='404'): ?>
			<h5>Whoops! Page down!! Page no sound!</h5>
			<?php endif; ?>
			<h4><?php echo $code ?> - <?php echo $message ?></h4>
		</div></div>
	</div></div>

	<div id="lay_top">
	</div>
	
<?php /* --- begin of main layout --- */ ?>
	
	<div id="lay_main" class="pos_c lay_main_login"><div class="fixed">
		<div id="lay_content">	
	
	<div align="center">
		<div id="system-message">
		<div class="flash_error fade">
			Uh oh... We are sorry. 
			Whatever you are looking isn't around. 
			Go back friend, go back...
		</div></div>	
		
		<div class="lay_box">
			
<dl>
  <dt>Did you type the URL?</dt>
  <dd>You may have typed the address (URL) incorrectly. Check it to make sure you've got the exact right spelling, capitalization, etc.</dd>

  <dt>Did you follow a link from somewhere else at this site?</dt>
  <dd>If you reached this page from another part of this site, please email us at <?php echo mail_to('[email]') ?> so we can correct our mistake.</dd>

  <dt>Did you follow a link from another site?</dt>
  <dd>Links from other sites can sometimes be outdated or misspelled. Email us at <?php echo mail_to('[email]') ?> where you came from and we can try to contact the other site in order to fix the problem.</dd>
</dl>

	<div class="suggestion">
		<h4><?php echo $message; ?></h4>
		<?php if ($code == '404'): ?>
			<p>We all make mistakes. Please take me out of here.</p>
		<?php endif; ?>

<dl>
  <dt>What's next</dt>
  <dd>
		<a class="readon" href="javascript:history.go(-1)">
				Back to previous page</a>&nbsp;
		<?php echo link_to('Go to Homepage', '@homepage',
				array('class'=>'readon') ) ?></p>
  </dd>
</dl>				
		<br/>
	</div>



		</div><?php /* outline */?>

	</div>

		</div>
	</div></div>
<?php /* --- end of main layout --- */ ?>

	<div id="lay_footer">
		<div id="footer">	
		Copyright &copy; <?php echo date('Y'); ?></div>
	</div>	

<a href="#top" id="gototop" class="no-click no-print"><?php 
	echo __('Top of Page'); ?></a>
</div>
</body>
</html>
