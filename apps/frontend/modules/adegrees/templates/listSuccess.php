<?php 
	slot('title', 'A Degrees List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      
      <th><?php echo __('Strata'); ?></th>
      <th><?php echo __('Admitted'); ?></th>
      <th><?php echo __('Graduated'); ?></th>
      <th><?php echo __('Degree'); ?></th>
      <th><?php echo __('Institution'); ?></th>
      <th><?php echo __('Major'); ?></th>
      <th><?php echo __('Minor'); ?></th>
      <th><?php echo __('Concentration'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($a_degrees as $i => $row): ?>
    <tr>
      <td><a href="<?php echo url_for('adegrees/show?'
			.'did='.$row->getDid()) ?>">
		<?php echo $i+1 ?></a></td>
		
      <td><?php echo $row->getStrata() ?></td>
      <td><?php echo $row->getAdmitted() ?></td>
      <td><?php echo $row->getGraduated() ?></td>
      <td><?php echo $row->getDegree() ?></td>
      <td><?php echo $row->getInstitution() ?></td>
      <td><?php echo $row->getMajor() ?></td>
      <td><?php echo $row->getMinor() ?></td>
      <td><?php echo $row->getConcentration() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'adegrees/new?aid='.$aid, $attr); ?>
