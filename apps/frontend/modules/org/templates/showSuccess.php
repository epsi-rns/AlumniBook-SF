<?php 
	$org_id = $org->get('org_id'); 

	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
	
	include_partial('global/tab_org', array('org_id'=>$org_id) );
?>

<div class="sheet_admin">

<table>
  <tbody>
    <tr>
      <th><?php echo __('Name'); ?>:</th>
      <td><?php echo $org->getName() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Product'); ?>:</th>
      <td><?php echo $org->getProduct() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Note'); ?>:</th>
      <td><?php echo $org->getNote() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'org/edit?'
	.'org_id='.$org_id, $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'org/index', $attr_list); ?>

</div>
