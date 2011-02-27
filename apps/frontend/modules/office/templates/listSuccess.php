<?php 
	slot('title', 'Office Address List for '.$org->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_org', array('org_id'=>$oid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Organization'); ?></th>
      <th><?php echo __('Address'); ?></th>
      <th><?php echo __('Region'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($address as $i => $row): ?>
    <tr>
      <td width="2%"><a href="<?php echo url_for('office/show?'
		.'did='.$row->getDid()) 
		?>"><?php echo $i+1; ?></a></td>
      <td><?php echo $row->getOrganization() ?></td>
      <td><?php echo $row->getAddress() ?></td>
      <td><?php echo $row->getRegion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'office/new?oid='.$oid, $attr); ?>
