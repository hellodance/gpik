<div class="content-box"><!-- Start Content Box -->

    <div class="content-box-header">

        <h3 style="cursor: s-resize;"><?php echo isset($title) ? $title : "Admin "; ?></h3>
        <div class="clear"></div>
    </div> <!-- End .content-box-header -->

    <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab">

            <?php echo form_open(null, array("id" => "user-edit", "method" => "post")); ?>

            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                <p>
                    <label for="username">Username*</label>
                    <input type="text" name="username" id="username" value="<?php echo set_value("username", $user_data->username); ?>" class="text-input medium-input"/>
                    <?php echo form_error("username"); ?>
                </p>
                <p>
                    <label for="email">Email*</label>
                    <input type="text" name="email" id="email" value="<?php echo set_value("email", $user_data->email); ?>" class="text-input medium-input"/>
                    <?php echo form_error("email"); ?>
                </p>
                <p>
                    <label for="npassword">New Password</label>
                    <input type="password" name="npassword" id="npassword" value="<?php echo set_value("npassword"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("npassword"); ?>
                </p>
                <p>
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" value="<?php echo set_value("cpassword"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("cpassword"); ?>
                </p>
                <p>
                    <label for="opassword">Old Password*</label>
                    <input type="password" name="opassword" id="opassword" value="<?php echo set_value("opassword"); ?>" class="text-input medium-input"/>
                    <?php echo form_error("opassword"); ?>
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