<?php 
	$link = $sf_data->getRaw('link');
	$rows = $sf_data->getRaw('rows');

	function getRowURL($rows, $link, $d) {
		$ys = round($d/10).'x';
		$dlink = url_for($link.'&decade='.$d);	

		$year	= '<a href="'.$dlink.'">'.$ys."</a>";
		$vals	= array($year);

		for ($i=0; $i<10; $i++) {
			$y=$i+$d;			
			if (isset($rows[$y])) {
				$ylink = url_for($link.'&year='.$y);  
				$t = $rows[$y];
				$vals[] = '<a href="'.$ylink.'">'.$t.'</a>'; 
			} else $vals[] = '';
		} 

		return $vals;
	}	
?>	
			<div class="sheet_summary" align="center">
			<h4>Summary for this Community</h4>
			<table border="0" cellspacing="2" cellpadding="3">
				<tr class="even" align="right">
					<td>&nbsp;<?php echo __('Year'); ?>&nbsp;</td>		
					<?php for ($i=0; $i<10; $i++): ?>
					<td>&nbsp;0<?php echo $i;?>&nbsp;</td>
					<?php endfor; ?>
				</tr>
				<?php 
					for ($d=1960, $ste=true; $d<2010; $d+=10, $ste=!$ste): 
					$refs = getRowURL($rows, $link, $d); ?>
				<tr class="<?php echo $ste ? 'odd' : 'even' ?>" align="right"> 				
					<td>&nbsp;<?php echo ($first=array_shift($refs));?>&nbsp;</td>
					<?php foreach($refs as $ref): ?>
					<td nowrap><?php echo $ref;?></td>
					<?php endforeach; ?>
				</tr>
				<?php endfor; ?>				
			</table>
			</div>
