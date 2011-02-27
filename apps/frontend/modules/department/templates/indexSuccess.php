
  <script type="text/javascript">
	window.addEvent('domready', function() {
		mootools_accordion();
	});
  </script>

<div class="sheet">
  <?php foreach ($faculties as $faculty): ?>
    <div class="category__facultyname">
      <div class="acdn_toggler category" title="Click to expand/ collapse accordion.">
      	<div id="gloss"><div class="breadcrumbs">
			<?php echo $faculty; ?>
		</div></div>
      </div>
 
	  <div class="acdn_element category">
      <table>
        <?php foreach ($faculty->getDepartments($lang) as $i => $dept): ?>
          <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
			<td><a href="<?php echo url_for(
				'acommunities/filter?dept='.$dept->get('department_id')) ?>">
				<?php echo $dept->get('department') ?></a></td
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
    </div>
  <?php endforeach; ?>
</div>
