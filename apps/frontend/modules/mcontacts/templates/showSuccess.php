<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list');
	 
	include_partial('global/tab_map', array(
		'aid'		=>	$map->get('aid'),
		'org_id'	=>	$map->get('org_id'),
		'mid'		=>	$row->get('lid')
	) );
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Alumni'); ?>:</th>
      <td><?php echo $map->getAlumni() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Organization'); ?>:</th>
      <td><?php echo $map->getOrganization() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Type'); ?>:</th>
      <td><?php echo $row->getContactType() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Contact'); ?>:</th>
      <td><?php echo $row->getContact() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'mcontacts/edit?'
	.'did='.$row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'mcontacts/list?'
	.'mid='.$row->get('lid'), $attr_list); ?>
