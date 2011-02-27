  <?php slot('title', __('Table of Contents')); ?>
  <?php include_partial('language', array('form' => $form)); ?>  
  <br/>

<?php 
	$attr_new	= array('class' => 'icon_new'); 
	$attr_edit	= array('class' => 'icon_edit'); 
	$attr_party	= array('class' => 'icon_cake'); 
	$attr_group	= array('class' => 'icon_group'); 
	$attr_chart	= array('class' => 'icon_chart_bar'); 
	$attr_address	= array('class' => 'icon_building'); 
	$attr_contact	= array('class' => 'icon_telephone'); 

	$timelastupdate	= strtotime($last_update);
	$lastupdate		= strftime(__('%A, %e %B %Y, %T'), $timelastupdate);	
?>
    <table width="100%" cellpadding="4" cellspacing="0" border="0" align="center" class="contentpane">
		<tr>
			<td width="50%" valign="top" class="contentdescription">
			<div class="componentheading"><?php echo __('Community'); ?></div>
			<?php echo __('Start looking here...'); ?></td>
			<td width="50%" valign="top" class="contentdescription">
			<div class="componentheading"><?php echo __('Update Data'); ?></div>
			<?php echo __('Admin Data Entry'); ?>:</td>				
		</tr>	
      <tr>
		<td>
		<div class="clip_population"></div>
		<ul>
			<li><?php echo link_to(__('Community'), 'community/index', $attr_group); ?></li>
			<li><?php echo link_to(__('Total Summary in Chart'), 'acommunities/total', $attr_chart); ?></li>
		</ul></td>
		<td>
		<div class="clip_yellow_jacket"></div>
		<ul>
			<li><?php echo link_to(__('Add Alumna/us'), 'alumni/new', $attr_new); ?></li>
			<li><?php echo link_to(__('Add Organization'), 'org/new', $attr_new); ?></li>
			<li><?php echo link_to(__('Manage Alumni'), 'alumni/index', $attr_edit); ?></li>
			<li><?php echo link_to(__('Manage Organization'), 'org/index', $attr_edit); ?></li>
		</ul></td>		
      </tr>
      <tr>
		<td width="50%" valign="top" class="contentdescription">
		<div class="componentheading"><?php echo __('Attribute of Alumni'); ?></div>
		</td>
		<td width="50%" valign="top" class="contentdescription">
		<div class="componentheading"><?php echo __('Attribute of Organization'); ?></div>
		</td>
      </tr>
      <tr>
		<td>
		<div class="clip_attributes"></div>
		<ul>
			<li><?php echo link_to(__('Browse Alumni'), 'acommunities/filter'); ?></li>
			<li><?php echo link_to(__('Competencies'), 'acompetencies/category'); ?></li>
			<li><?php echo link_to(__('Certifications'), 'acertifications/index'); ?></li>
			<li><?php echo link_to(__('Experiences'), 'aexperiences/index'); ?></li>
			<li><?php echo link_to(__('Academic Degrees'), 'adegrees/index'); ?></li>
			<li><?php echo link_to(__('Birthday'), '@birth', $attr_party); ?></li>
		</ul>
		<ul>
			<li><?php echo link_to(__('Addresses: Home/ Residence'), 'residence/index', $attr_address); ?></li>
			<li><?php echo link_to(__('Personal Contacts'), 'acontacts/index', $attr_contact); ?></li>		
		</ul></td>
		<td>
		<div class="clip_institution"></div>
		<ul>
			<li><?php echo link_to(__('Browse Organizations/ Companies'), 'org/filter'); ?></li>
			<li><?php echo link_to(__('Fields'), 'ofields/category'); ?></li>
		</ul>
		<ul>
			<li><?php echo link_to(__('Addresses: Office'), 'office/index', $attr_address); ?></li>
			<li><?php echo link_to(__('Office Contacts'), 'ocontacts/index', $attr_contact); ?></li>		
		</ul></td>
      </tr>
      <tr>
		<td width="100%" colspan="2" valign="top" class="contentdescription">
		<div class="componentheading"><?php echo __('Job and Occupation'); ?></div>
		</td>
      </tr>
      <tr>
		<td>
		<div class="clip_industrial"></div>
		<ul>
			<li><?php echo link_to(__('Occupation'), 'amap/category'); ?></li>
			<li><?php echo link_to(__('Job Position'), 'omap/category'); ?></li>
		</ul>
		<ul>
			<li><?php echo link_to(__('Addresses: Job/ Work Place'), 'workplace/index', $attr_address); ?></li>
			<li><?php echo link_to(__('Job Contacts'), 'mcontacts/index', $attr_contact); ?></li>		
		</ul></td>
      </tr>
    </table>

  <br/>
  <q><?php 
	echo __('Last updated of this data:'); ?> <blink><?php 
	echo $lastupdate;?></blink>.</q>
