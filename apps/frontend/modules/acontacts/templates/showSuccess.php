<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 

	$aid = $row->get('lid');
	include_partial('global/tab_alumni', array('aid'=>$aid) );	
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Alumni'); ?>:</th>
      <td><?php echo $row->getAlumni() ?></td>
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

<?php echo link_to(__('Edit'), 'acontacts/edit?'
	.'did='.$row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'acontacts/list?'
	.'aid='.$row->get('lid'), $attr_list); ?>
