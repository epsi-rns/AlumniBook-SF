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
      <th><?php echo __('Community'); ?>:</th>
      <td><?php echo $a_row->getCommunity() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Class of (year)'); ?>:</th>
      <td><?php echo $a_row->getClassYear() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Subclass'); ?>:</th>
      <td><?php echo $a_row->getClassSub() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Community - Year'); ?>:</th>
      <td><?php echo $a_row->get('community') ?></td>
    </tr>
    <tr>
      <th><?php echo __('Program'); ?>:</th>
      <td><?php echo $a_row->getProgram() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Department'); ?>:</th>
      <td><?php echo $a_row->getDepartment() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Faculty'); ?>:</th>
      <td><?php echo $a_row->getFaculty() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'acommunities/edit?'
	.'did='.$a_row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'acommunities/list?'
	.'aid='.$a_row->get('aid'), $attr_list); ?>

