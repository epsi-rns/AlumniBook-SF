<?php 
	use_helper('sfMooDiaBox'); 
	plgContentDiaBoxFrameActivate();
	
	use_stylesheets_for_form($form); 
	use_javascripts_for_form($form);

	$isNew = $form->getObject()->isNew();
	$did = $form->getObject()->getDid();
	
	$attr_list = array('class' => 'icon_list'); 
	$attr_dele = array(
		'method' => 'delete', 
		'confirm' => 'Are you sure?', 
		'class' => 'icon_delete');

	$url_form = url_for('acommunities/'
		.($isNew ? 'create' : 'update?did='.$did));
?>

<script type="text/javascript">
	window.addEvent("domready",function(){	
		document.id('a_communities_cid')
			.addClass('required');
		document.id('a_communities_class_year')
			.addClass('required validate-integer');
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
				'acommunities/list?aid='.$aid, $attr_list); ?>
          <?php if (!$isNew): ?>
            &nbsp;<?php echo link_to(__('Delete'), 
				'acommunities/delete?did='.$did, $attr_dele) ?>
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
