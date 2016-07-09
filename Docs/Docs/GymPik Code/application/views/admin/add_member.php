<div class="content-box">
	<!-- Start Content Box -->
    <div class="content-box-header">
        <h3 style="cursor: s-resize;"><?php echo isset($title) ? $title : "Admin "; ?></h3>
        <div class="clear"></div>
    </div> 
	<!-- End .content-box-header -->
   <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab">

            <?php echo form_open(null, array("id" => "add-user", "method" => "post")); ?>

            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                <p>
                    <label for="fname">First name*</label>
                    <input type="text" name="fname" id="fname" value="<?php echo set_value("fname"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("fname"); ?>
                </p>
                <p>
                    <label for="lname">Last name*</label>
                    <input type="text" name="lname" id="lname" value="<?php echo set_value("lname"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("lname"); ?>
                </p>
               
                <p>
                    <label for="email">Email*</label>
                    <input type="text" name="email" id="email" value="<?php echo set_value("email"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("email"); ?>
                </p>
				 <p>
                    <label for="mob_no">Mobile no.*</label>
                    <input type="text" name="mob_no" id="mob_no" value="<?php echo set_value("mob_no"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("mob_no"); ?>
                </p>
                <p>
                    <label for="pass">Password*</label>
                    <input type="password" name="pass" id="pass" value="<?php echo set_value("pass"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("pass"); ?>
                </p>
				<p>
                    <label for="pass2">Confirm Password*</label>
                    <input type="password" name="pass2" id="pass2" value="<?php echo set_value("pass2"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("pass2"); ?>
                </p>
				<p>
                    <label for="type">User type </label>
                    <select name="type" id="type">
					<option value="1">Simple User</option>
					<option value="2">Trainer</option>
					</select>
					<?php echo form_error("pass2"); ?>
                </p>
				
                <p>
                    <input type="submit" value="Submit" class="button">
                </p>

            </fieldset>

            <div class="clear"></div><!-- End .clear -->

            <?php echo form_close(); ?>

        </div> <!-- End #tab2 -->        

    </div> <!-- End .content-box-content -->
</div>