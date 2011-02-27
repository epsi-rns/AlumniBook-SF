    <table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="contentpane">
      <tr>
		<td width="100%" colspan="2" valign="top" class="contentdescription">
			<div class="componentheading"><?php 
			echo __('Choose Job Position'); ?></div></td>
      </tr>
      <tr>
		<td><ul>
<?php foreach ($cats as $cat): 
	$text = $cat->getJobPosition();
	$link = 'omap/filter?id='.$cat->getJobPositionId();
?>
				<li><?php echo link_to($text, $link); 
					?> (<?php echo $cat->getTotal(); ?>)</li>
<?php endforeach; ?>				
		</ul></td>
      </tr>
    </table>
