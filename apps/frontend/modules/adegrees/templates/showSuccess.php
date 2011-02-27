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
      <th><?php echo __('Strata'); ?>:</th>
      <td><?php echo $a_row->getStrata() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Admitted'); ?>:</th>
      <td><?php echo $a_row->getAdmitted() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Graduated'); ?>:</th>
      <td><?php echo $a_row->getGraduated() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Degree'); ?>:</th>
      <td><?php echo $a_row->getDegree() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Institution'); ?>:</th>
      <td><?php echo $a_row->getInstitution() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Major'); ?>:</th>
      <td><?php echo $a_row->getMajor() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Minor'); ?>:</th>
      <td><?php echo $a_row->getMinor() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Concentration'); ?>:</th>
      <td><?php echo $a_row->getConcentration() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'adegrees/edit?'
	.'did='.$a_row->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'adegrees/list?'
	.'aid='.$a_row->get('aid'), $attr_list); ?>
