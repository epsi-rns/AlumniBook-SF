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
	$url_form = url_for('mcontacts/'
		.($isNew ? 'create' : 'update?did='.$did));
?>

<script type="text/javascript">
	window.addEvent("domready",function(){	
		document.id('m_contacts_ct_id').addClass('required');
		document.id('m_contacts_contact').addClass('required');
		new FormValidator.Inline('form_validate');		
	});
</script>

<form action="<?php echo $url_form ?>" method="post" id="form_validate" <?php 
	$form->isMultipart() and print 'enctype="multipart/form-data" '?>>
<?php if (!$isNew): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<?php echo link_to(__('Back to list'), 
				'mcontacts/list?mid='.$lid, $attr_list); ?>
          <?php if (!$isNew): ?>
            &nbsp;<?php echo link_to(__('Delete'), 
				'mcontacts/delete?did='.$did, $attr_dele) ?>
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
