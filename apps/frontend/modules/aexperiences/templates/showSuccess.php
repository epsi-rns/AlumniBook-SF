<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 

	$aid = $a_row->get('aid');
	include_partial('global/tab_alumni', array('aid'=>$aid) );	
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Alumni'); ?>:</th>
      <td><?php echo $a_row->getAlumni() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Organization'); ?>:</th>
      <td><?php echo $a_row->getOrganization() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Description'); ?>:</th>
      <td><?php echo $a_row->getDescription() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Job Position'); ?>:</th>
      <td><?php echo $a_row->getJobPosition() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Year in'); ?>:</th>
      <td><?php echo $a_row->getYearIn() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Year out'); ?>:</th>
      <td><?php echo $a_row->getYearOut() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'aexperiences/edit?'
	.'did='.$a_row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'aexperiences/list?'
	.'aid='.$a_row->get('aid'), $attr_list); ?>
