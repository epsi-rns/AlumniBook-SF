<?php 
	use_stylesheets_for_form($form); 
	use_javascripts_for_form($form);

	$isNew = $form->getObject()->isNew();
	$did = $form->getObject()->get('did');
	$lid = $form->getObject()->get('lid');
	
	$attr_list = array('class' => 'icon_list'); 
	$attr_dele = array(
		'method' => 'delete', 
		'confirm' => 'Are you sure?', 
		'class' => 'icon_delete');

	$url_form = url_for('workplace/'
		.($isNew ? 'create' : 'update?did='.$did));

	include_partial('global/dynamic_dropdown', array(
		'form' => $form, 'route' => 'ajax/District',
		'master' => 'province_id', 'detail' => 'district_id'
	));	  
?>

<form action="<?php echo $url_form ?>" method="post" <?php 
	$form->isMultipart() and print 'enctype="multipart/form-data" '?>>
<?php if (!$isNew): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<?php echo link_to(__('Back to list'), 
				'workplace/list?mid='.$lid, $attr_list); ?>
          <?php if (!$isNew): ?>
            &nbsp;<?php echo link_to(__('Delete'), 
				'workplace/delete?did='.$did, $attr_dele) ?>
          <?php endif; ?>
          <input type="submit" value="<?php echo __('Save'); ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
