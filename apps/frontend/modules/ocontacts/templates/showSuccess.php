<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
	
	$org_id = $row->get('lid');
	include_partial('global/tab_org', array('org_id'=>$org_id) );
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Organization'); ?>:</th>
      <td><?php echo $row->getOrganization() ?></td>
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

<?php echo link_to(__('Edit'), 'ocontacts/edit?'
	.'did='.$row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'ocontacts/list?'
	.'oid='.$row->get('lid'), $attr_list); ?>
