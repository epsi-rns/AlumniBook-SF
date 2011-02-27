<?php 
	slot('title', 'Communities List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new');
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Community'); ?></th>
      <th><?php echo __('Class of (year)'); ?></th>
      <th><?php echo __('Subclass'); ?></th>
      <th><?php echo __('Program'); ?></th>
      <th><?php echo __('Department'); ?></th>
      <th><?php echo __('Faculty'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($a_communities as $i => $row): ?>
    <tr>
      <td width="2%"><?php echo $i+1; ?></td>
      <td><a href="<?php echo url_for('acommunities/show?'
			.'did='.$row->getDid()) ?>">
		<?php echo $row->get('community') ?></a></td>
      <td><?php echo $row->getClassYear() ?></td>
      <td><?php echo $row->getClassSub() ?></td>      
      <td><?php echo $row->getProgram() ?></td>
      <td><?php echo $row->getDepartment() ?></td>
      <td><?php echo $row->getFaculty() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'acommunities/new?aid='.$aid, $attr); ?>
