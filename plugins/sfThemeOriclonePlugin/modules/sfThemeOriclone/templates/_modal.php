<?php 
	/** initial design and code by: Epsi Nurwijayadi **/ 

	use_stylesheet('/sfThemeOriclonePlugin/css/style.css');
		
	// helper groups
	use_helper('setOricloneOptions');
	use_helper('docType');

	$sf_content = $sf_data->getRaw('sf_content');
	extract(sfConfig::get('app_oriclone_modal'));
	setOricloneStyleSheets($css);
		
	// DocType
	$lang = $sf_user->getCulture();
	echo doc_type('XHTML 1.0 Strict');
	echo xml_version($lang);
?>
<head>
    <?php include_title() ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
</head>

<body class="width_fluid mbg_white">
	<a name="top" id="top"></a>
	<div id="container-console"></div>
	
	<div id="lay_main" class="pos_c">
		<div id="lay_content">	
		<div id="main_content" class="main_content">
	
		<?php echo $sf_content; ?>
	
		</div>
		</div>
	</div>
	
	<a name="bottom" id="bottom"></a>
</body>

</html>
