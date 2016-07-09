<div id="sidebar-wrapper">
  <h1 id="sidebar-title"><a href="#"><?php echo $this->config->item("site_title"); ?> Admin</a></h1>
  <a href="#"><img id="logo" src="<?php echo base_url("/images/admin/new_logo.png")?>" alt="Simpla Admin logo" /></a>
  <div id="profile-links"> Hello, <a href="<?php echo site_url("admin/admins/edit"); ?>" title="Edit your profile"><?php echo $this->site_santry->get_auth_data()->username; ?></a>
    <!--, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a>-->
    <br />
    <br />
    <a href="<?php echo site_url("?ref=admin"); ?>" title="View the Site" target="_blank">View the Site</a> | <a href="<?php echo site_url("admin/admins/logout")?>" title="Sign Out">Sign Out</a> </div>
  <ul id="main-nav">
    <li>
		<a href="#" class="nav-top-item">Admin </a>
      	<ul>
        	<li><a href="<?php echo site_url("admin/admins/dashboard"); ?>">Dashboard</a></li>
        	<li><a href="<?php echo site_url("admin/admins/edit"); ?>">Admin Settings</a></li>
			<li><a href="<?php echo site_url("admin/admins/site_setting"); ?>">Site Settings</a></li>
      	</ul>
    </li>
	<li>
		<a href="#" class="nav-top-item">Users </a>
      	<ul>
        	<li><a href="<?php echo site_url("admin/users/add"); ?>">Add users</a></li>
        	<li><a href="<?php echo site_url("admin/users/manage"); ?>">Manage Users</a></li>
      	</ul>
    </li>
	
	<li>
		<a href="#" class="nav-top-item">Emails </a>
      	<ul>
        	<li><a href="<?php //echo site_url("admin/admins/dashboard"); ?>">Send Email</a></li>
        	<li><a href="<?php echo site_url("admin/emails/manage"); ?>">Manage templates</a></li>
      	</ul>
    </li>
	<li>
		<a href="#" class="nav-top-item">FAQ </a>
      	<ul>
        	<li><a href="<?php echo site_url("admin/faqs/add"); ?>">Add FAQ</a></li>
        	<li><a href="<?php echo site_url("admin/faqs/manage"); ?>">Manage FAQ</a></li>
      	</ul>
    </li>
	
	
  </ul>
</div>
