<?php 
	slot('title', 'Organization Contacts List for '.$org->getName() );
	$attr = array('class' => 'icon_new');
	include_partial('global/tab_org', array('org_id'=>$oid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Type'); ?></th>
      <th><?php echo __('Contact'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $i => $row): ?>
    <tr>
      <td width="2%"><?php echo $i+1; ?></td>
      <td><a href="<?php echo url_for('ocontacts/show?'
		.'did='.$row->getDid()) 
		?>"><?php echo $row->getContactType() ?></a></td>
      <td><?php echo $row->getContact() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'ocontacts/new?oid='.$oid, $attr); ?>
