<?php 
	$timeformat = '%Y-%m-%dT%H:%M:%SZ';
	$xml ='<?xml version="1.0" encoding="utf-8"?'.'>';
	echo $xml;
?>	
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>Recent Alumni Record</title>
  <subtitle>Record of new alumni entry by questionnaire</subtitle>
  <link href="<?php echo url_for('main/index.atom'); ?>" rel="self"/>
  <link href="<?php echo url_for('@homepage', true) ?>"/>
  <updated><?php echo gmstrftime($timeformat, $last_update); ?></updated>
  <author><name>AlumniBook</name></author>
  <id><?php echo sha1(url_for('main/feed.atom')); ?></id>

<?php foreach ($rows as $row): 
	$aid = $row->get('aid');
	$last_update = $row->getDateTimeObject('updated_at')->format('U');
	
	$communities = $row->getACommunities();
	$comies = array();
	
	foreach($communities as $community)
		$comies[] = $community->get('community');
	
	$text_comy = implode('<br/>', $comies);
?>
  <entry>
    <title><?php echo $row->get('fullname'); ?></title>
    <link href="<?php echo url_for('alumni/detail?aid='.$aid) ?>" />
    <id><?php echo sha1($aid); ?></id>
    <updated><?php echo gmstrftime($timeformat, $last_update); ?></updated>
    <summary type="xhtml">
	<div xmlns="http://www.w3.org/1999/xhtml">
		<?php echo $text_comy; ?>
	</div>
	</summary>
  </entry>
<?php endforeach; ?>
</feed>
