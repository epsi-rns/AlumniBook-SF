<?php 
	slot('title', 'AO Maps List for '.$org->getName() );
	$attr = array('class' => 'icon_new'); 

	include_partial('global/tab_org', array('org_id'=>$org_id) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Alumni'); ?></th>
      <th><?php echo __('Department '); ?></th>
      <th><?php echo __('Job Type'); ?></th>
      <th><?php echo __('Job position'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ao_maps as $ao_map): ?>
    <tr>
      <td><a href="<?php echo url_for('omap/show?mid='.$ao_map->getMid()) 
		?>"><?php echo $ao_map->getMid() ?></a></td>
      <td><?php echo $ao_map->getAlumni() ?></td>
      <td><?php echo $ao_map->getDepartment() ?></td>
      <td><?php echo $ao_map->getJobType() ?></td>
      <td><?php echo $ao_map->getJobPosition() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'omap/new?oid='.$org_id, $attr); ?>
