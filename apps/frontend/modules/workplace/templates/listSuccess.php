<?php slot(
	'title',
	'Work Place Address List for '
		.$map->getAlumni() .' - '
		.$map->getOrganization() );

	$attr = array('class' => 'icon_new');

	include_partial('global/tab_map', array(
		'aid'		=>	$map->get('aid'),
		'org_id'	=>	$map->get('org_id'),
		'mid'		=>	$mid
	) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Alumni'); ?></th>
      <th><?php echo __('Organization'); ?></th>
      <th><?php echo __('Address'); ?></th>
      <th><?php echo __('Region'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($address as $i => $row): ?>
    <tr>
      <td width="2%"><a href="<?php echo url_for('workplace/show?'
		.'did='.$row->getDid()) 
		?>"><?php echo $i+1; ?></a></td>
      <td><?php echo $row->getAOMap()->getAlumni() ?></td>
      <td><?php echo $row->getAOMap()->getOrganization() ?></td>
      <td><?php echo $row->getAddress() ?></td>
      <td><?php echo $row->getRegion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'workplace/new?mid='.$mid, $attr); ?>
