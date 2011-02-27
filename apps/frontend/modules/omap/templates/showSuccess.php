<?php 
	$mid = $ao_map->get('mid'); 

	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 

	include_partial('global/tab_map', array(
		'aid'		=>	$ao_map->get('aid'),
		'org_id'	=>	$ao_map->get('org_id'),
		'mid'		=>	$mid
	) );
?>
<div class="sheet_admin">
	
<table>
  <tbody>
    <tr>
      <th><?php echo __('Alumni'); ?>:</th>
      <td><?php echo $ao_map->getAlumni() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Organization'); ?>:</th>
      <td><?php echo $ao_map->getOrganization() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Department '); ?>:</th>
      <td><?php echo $ao_map->getDepartment() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Description'); ?>:</th>
      <td><?php echo $ao_map->getDescription() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Structural Job Position'); ?>:</th>
      <td><?php echo $ao_map->getStruktural() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Functional Job Position'); ?>:</th>
      <td><?php echo $ao_map->getFungsional() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Job Type'); ?>:</th>
      <td><?php echo $ao_map->getJobType() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Job Position'); ?>:</th>
      <td><?php echo $ao_map->getJobPosition() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'omap/edit?'
	.'mid='.$mid, $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'omap/list?'
	.'oid='.$ao_map->get('org_id'), $attr_list); ?>

</div>
