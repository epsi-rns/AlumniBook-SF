<?php 
	$aid = $alumni->get('aid'); 
	
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
	
	include_partial('global/tab_alumni', array('aid'=>$aid) );
?>

<div class="sheet_admin">

<table>
  <tbody>
    <tr>
      <th><?php echo __('Name'); ?>:</th>
      <td><?php echo $alumni->getName() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Prefix'); ?>:</th>
      <td><?php echo $alumni->getPrefix() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Suffix'); ?>:</th>
      <td><?php echo $alumni->getSuffix() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Gender'); ?>:</th>
      <td><?php echo $alumni->getGenderText() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Birth Place'); ?>:</th>
      <td><?php echo $alumni->getBirthPlace() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Birth Date'); ?>:</th>
      <td><?php echo $alumni->getBirthDate() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Religion'); ?>:</th>
      <td><?php echo $alumni->getReligion() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Note'); ?>:</th>
      <td><?php echo $alumni->getNote() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'alumni/edit?aid='.$aid, $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'alumni/index', $attr_list); ?>

</div>
