<?php 
	$attr_edit = array('class' => 'icon_edit'); 
	$attr_list = array('class' => 'icon_list'); 
	
	$aid = $address->get('lid');
	include_partial('global/tab_alumni', array('aid'=>$aid) );	
?>
<table>
  <tbody>
    <tr>
      <th><?php echo __('Area'); ?>:</th>
      <td><?php echo $address->getArea() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Building'); ?>:</th>
      <td><?php echo $address->getBuilding() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Street'); ?>:</th>
      <td><?php echo $address->getStreet() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Postal Code'); ?>:</th>
      <td><?php echo $address->getPostalCode() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Country'); ?>:</th>
      <td><?php echo $address->getCountry() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Province'); ?>:</th>
      <td><?php echo $address->getProvince() ?></td>
    </tr>
    <tr>
      <th><?php echo __('District'); ?>:</th>
      <td><?php echo $address->getDistrict() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(__('Edit'), 'residence/edit?'
	.'did='.$address->get('did'), $attr_edit); ?>
&nbsp;
<?php echo link_to(__('List'), 'residence/list?'
	.'aid='.$address->get('lid'), $attr_list); ?>
