<?php 
	slot('title', 'Competencies List for '.$alumni->getName() );
	$attr = array('class' => 'icon_new'); 
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<table>
  <thead>
    <tr>
      <th width="20">#</th>
      <th><?php echo __('Competency'); ?></th>
      <th><?php echo __('Description'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($a_competencies as $i => $row): ?>
    <tr>
      <td><?php echo $i+1 ?></td>
      <td><a href="<?php echo url_for('acompetencies/show?'
			.'did='.$row->getDid()) ?>">
		<?php echo $row->getCompetency() ?></a></td>
      <td><?php echo $row->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo link_to(__('New'), 'acompetencies/new?aid='.$aid, $attr); ?>
