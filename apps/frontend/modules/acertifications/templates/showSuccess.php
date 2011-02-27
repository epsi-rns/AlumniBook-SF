<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 

	$aid = $a_row->get('aid');
	include_partial('global/tab_alumni', array('aid'=>$aid) );	
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Alumni'); ?>:</th>
      <td><?php echo $a_row->getAlumni() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Certification'); ?>:</th>
      <td><?php echo $a_row->getCertification() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Institution'); ?>:</th>
      <td><?php echo $a_row->getInstitution() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'acertifications/edit?'
	.'did='.$a_row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'acertifications/list?'
	.'aid='.$a_row->get('aid'), $attr_list); ?>

