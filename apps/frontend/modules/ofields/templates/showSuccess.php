<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
	
	$org_id = $o_row->get('org_id');
	include_partial('global/tab_org', array('org_id'=>$org_id) );
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Organization'); ?>:</th>
      <td><?php echo $o_row->getOrganization() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Business Field'); ?>:</th>
      <td><?php echo $o_row->getBizField() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Description'); ?>:</th>
      <td><?php echo $o_row->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'ofields/edit?'
	.'did='.$o_row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'ofields/list?'
	.'oid='.$o_row->get('org_id'), $attr_list); ?>

