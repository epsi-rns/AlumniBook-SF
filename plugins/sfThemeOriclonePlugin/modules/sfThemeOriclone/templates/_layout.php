<?php 
	/** initial design and code by: Epsi Nurwijayadi **/ 

	// helper groups
	use_helper('setOricloneOptions');
	use_helper('docType');
	
	$sf_content = $sf_data->getRaw('sf_content');		
	extract(sfConfig::get('app_oriclone_layout'));

	setOricloneStyleSheets($css);
	$classes = getOricloneStyleClasses($classes);
	initOricloneAssetsLayout($debug_css, $effects);
	
	// render blocks first, get styles and javascripts
	if (!isset($blocks)) $blocks = array();
	foreach ($blocks as $block => $templateName)
		$blocks[$block] = get_partial($templateName);
		
	$page_top	= isset($blocks['page_top']) ? $blocks['page_top'] : false;		
		
	// DocType
	$lang = $sf_user->getCulture();
	echo doc_type('XHTML 1.0 Strict');
	echo xml_version($lang);
?>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
	<meta http-equiv="MSThemeCompatible" content="No"/>
	<link rel="shortcut icon" type="image/x-icon" 
		href="/sfThemeOriclonePlugin/images/oriclone/favicon.ico" />
    <link rel="alternate" type="application/atom+xml" title="Latest Alumni"
      href="<?php echo url_for('main/index.atom'); ?>" />
	<link type="text/plain" rel="author" href="/humans.txt" />      
</head>

<body class="<?php echo $classes;?>">
<div id="wrapper">
	<a name="top" id="top"></a>

<?php if ($page_top) echo $page_top; ?>
	
<?php
include_partial('sfThemeOriclone/top', 
	array('blocks' => $blocks, 'sitename' => $sitename, 'logo' => $logo));
?>
	<div id="container-console"></div>
<?php	
/* --- begin of main layout --- */ 
include_partial('sfThemeOriclone/main', array(
	'sf_content' => $sf_content, 'blocks' => $blocks
));

/* --- end of main layout --- */ 
include_partial('sfThemeOriclone/bottom', array('blocks' => $blocks));
?>
<a href="#top" id="gototop" class="no-click no-print"><?php 
	echo __('Top of Page'); ?></a>
<a name="bottom" id="bottom"></a>
</div>
</body>
</html>
