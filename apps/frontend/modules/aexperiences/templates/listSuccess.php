<?php 
	slot('title', 'Experiences List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Organization'); ?></th>
      <th><?php echo __('Description'); ?></th>
      <th><?php echo __('Job Position'); ?></th>
      <th><?php echo __('Year in'); ?></th>
      <th><?php echo __('Year out'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($a_experiences as $i => $row): ?>
    <tr>
      <td><?php echo $i+1 ?></td>
      <td><a href="<?php echo url_for('aexperiences/show?'
			.'did='.$row->getDid()) ?>">
		<?php echo $row->getOrganization() ?></a></td>      
      <td><?php echo $row->getDescription() ?></td>
      <td><?php echo $row->getJobPosition() ?></td>
      <td><?php echo $row->getYearIn() ?></td>
      <td><?php echo $row->getYearOut() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'aexperiences/new?aid='.$aid, $attr); ?>
