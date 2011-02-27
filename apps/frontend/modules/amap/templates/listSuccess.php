<?php 
	slot('title', 'AO Maps List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new'); 

	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Organization'); ?></th>
      <th><?php echo __('Department'); ?></th>
      <th><?php echo __('Job Type'); ?></th>
      <th><?php echo __('Job Position'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ao_maps as $ao_map): ?>
    <tr>
      <td><a href="<?php echo url_for('amap/show?mid='.$ao_map->getMid()) 
		?>"><?php echo $ao_map->getMid() ?></a></td>
      <td><?php echo $ao_map->getOrganization() ?></td>
      <td><?php echo $ao_map->getDepartment() ?></td>
      <td><?php echo $ao_map->getJobType() ?></td>
      <td><?php echo $ao_map->getJobPosition() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'amap/new?aid='.$aid, $attr); ?>
