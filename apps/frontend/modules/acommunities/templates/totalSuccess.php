<?php 
	slot('title', __('Total for each communities') );
	
	include_partial('global/filter', array(
		'formFilter' => $formFilter,
		'groupFields' => array('group_by')
	));	
	
	$colorIndex = 1; // initial value
	
	switch($group_by)
	{
		case 1: case 6: $title=__('Community'); break;
		case 2: $title=__('Department'); break;
		case 3: $title=__('Faculty'); break;
		case 4: $title=__('Program'); break;
		case 5: $title=__('Class of (year)'); break;
	} 		
?>
<div class="sheet">
<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo $title; ?></th>
      <th><?php echo __('Percent'); ?></th>
      <th><?php echo __('Total'); ?></th>
      <th><?php echo __('Chart'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($t_communities as $i => $row): 
		$total		= $row->get('total');
		
		switch($group_by)
		{
			case 1: 
				$text = $row->getCommunity();
				$link = 'acommunities/filter'
					.'?prog='.$row->get('program_id')
					.'&dept='.$row->get('department_id');
				break;
			case 2: 
				$text = $row->getDepartment(); 
				$link = 'acommunities/filter'
					.'?dept='.$row->get('department_id');
				break;
			case 3: 
				$text = $row->getFaculty(); 
				$link = 'acommunities/filter'
					.'?fcly='.$row->get('faculty_id');
				break;
			case 4: 
				$text = $row->getProgram(); 
				$link = 'acommunities/filter'
					.'?prog='.$row->get('program_id');
				break;
			case 5: 
				$text = $row->get('class_year'); 
				$link = 'acommunities/filter'
					.'?year='.$row->get('class_year');
				break;
			case 6: 
				$text = $row->getCommunity().' - '.$row->get('class_year');
				$link = 'acommunities/filter'
					.'?prog='.$row->get('program_id')
					.'&dept='.$row->get('department_id')
					.'&year='.$row->get('class_year');
				break;
		} 

		$percent	= round(100*$total*100/$sum)/100;
		$width		= round($total*300/$max);
		if ($colorIndex==5) {$colorIndex=1;} else {$colorIndex++;}
	?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td width="2%"><?php echo $i+1; ?></td>
      <td width="20%" align="left"><?php echo link_to($text, $link); ?></td>		
	  <td width="10%" align="center"><?php echo $percent; ?>%</td>	
      <td width="10%" align="left"><?php echo $total; ?></td>
	  <td width="300" align="left"><img src="/images/accs/blank.png"
		class="bars_color_<?php echo $colorIndex; ?>" 
		height="2" width="<?php echo $width; ?>" alt="" /></td>	
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php include_partial('global/pager', array('pager' => $pager)); ?>
