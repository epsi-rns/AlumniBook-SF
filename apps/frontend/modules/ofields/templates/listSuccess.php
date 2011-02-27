<?php 
	slot('title', 'Business Fields List for '.$org->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_org', array('org_id'=>$org_id) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Business Field'); ?></th>
      <th><?php echo __('Description'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($o_fields as $row): ?>
    <tr>
      <td><a href="<?php echo url_for('ofields/show?'
		.'did='.$row->getDid()) ?>"><?php echo $row->getDid() ?></a></td>
      <td><?php echo $row->getBizField() ?></td>
      <td><?php echo $row->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'ofields/new?oid='.$org_id, $attr); ?>
