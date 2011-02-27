<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Community'); ?>:</th>
      <td><?php echo $community->get('community') ?></td>
    </tr>
    <tr>
      <th><?php echo __('Brief'); ?>:</th>
      <td><?php echo $community->getBrief() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Department'); ?>:</th>
      <td><?php echo $community->getDepartment() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Faculty'); ?>:</th>
      <td><?php echo $community->getFaculty() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Program'); ?>:</th>
      <td><?php echo $community->getProgram() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'community/edit?'
	.'cid='.$community->getCid(), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'community/index', $attr_list); ?>

