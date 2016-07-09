<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="login-content">
	<?php echo validation_errors(); ?>
	<?php echo form_open(site_url('admin/admins/login'), array("id" => "login-form", "method" => "post"));?>
		<div class="notification information png_bg">
			<div>
				Just click "Sign In".
			</div>
		</div>
		<p>
			<label for="username">Username</label>
			<?php echo form_input("username", set_value("username"), "id=\"username\" class=\"text-input\""); ?>
		</p>
		<div class="clear"></div>
		<p>
			<label for="password">Password</label>
			<?php echo form_password("password", null, "id=\"password\" class=\"text-input\""); ?>
		</p>
		<div class="clear"></div>
		<p>
                        <?php echo form_hidden('request', set_value('request', $request)); ?>
			<?php echo form_submit("submit", "Sign In", "class=\"button\""); ?>
		</p>
		
	<?php echo form_close(); ?>
</div> <!-- End #login-content -->