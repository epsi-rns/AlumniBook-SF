<?php 
	slot('title', 'A Certifications List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Certification'); ?></th>
      <th><?php echo __('Institution'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($a_certifications as $i => $row): ?>
    <tr>
      <td><?php echo $i+1 ?></td>
      <td><a href="<?php echo url_for('acertifications/show?'
			.'did='.$row->getDid()) ?>">
		<?php echo $row->getCertification() ?></a></td>
      <td><?php echo $row->getInstitution() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'acertifications/new?aid='.$aid, $attr); ?>
