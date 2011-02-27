
      <div id="header">
      <h1>
          <a href="<?php echo url_for('homepage') ?>">
            <img src="/images/logo/makara.png" alt="Alumni Board" />
          </a>
      </h1>
      </div>
 
      <div id="menu">
        <ul>		
			<lh>Class origin:</lh>	
			<li><?php echo link_to('Program', 'program') ?></li>
			<li><?php echo link_to('Department', 'department') ?></li>
			<li><?php echo link_to('Faculty', 'faculty') ?></li>
			<li><?php echo link_to('Community', 'community') ?></li>
        </ul>

        <ul>
			<lh>Personal Resume:</lh>	
			<li><?php echo link_to('Competency', 'competency') ?></li>			
			<li><?php echo link_to('Occupation', 'job_type') ?></li>
			<li><?php echo link_to('Rank', 'job_position') ?></li>
			<li><?php echo link_to('Business Field', 'field') ?></li>
			<li><?php echo link_to('Strata', 'strata') ?></li>
        </ul>
        
        <ul>
			<lh>Address:</lh>	
			<li><?php echo link_to('Country', 'country') ?></li>			
			<li><?php echo link_to('Province', 'province') ?></li>
			<li><?php echo link_to('District', 'district') ?></li>
        </ul>
        
        <ul>
			<lh>Miscellanous:</lh>	
			<li><?php echo link_to('Religion', 'religion') ?></li>
			<li><?php echo link_to('Contact Type', 'contact_type') ?></li>
        </ul>
      
      <br/>
		<ul>
			<lh>Users:</lh>	
			<li><?php echo link_to('Logout', 'sf_guard_signout') ?></li>
			<li><?php echo link_to('Users', 'sf_guard_user') ?></li>
			<li><?php echo link_to('Groups', 'sf_guard_group') ?></li>
			<li><?php echo link_to('Permissions', 'sf_guard_permission') ?></li>
		</ul>
      </div>
	  
	  <div class="clr">
	  </div>
