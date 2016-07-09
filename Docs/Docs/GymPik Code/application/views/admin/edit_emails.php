<div class="content-box">
	<!-- Start Content Box -->
    <div class="content-box-header">
        <h3 style="cursor: s-resize;"><?php echo isset($title) ? $title : "Admin "; ?></h3>
        <div class="clear"></div>
    </div> 
	<!-- End .content-box-header -->
   <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab">

            <?php echo form_open(null, array("id" => "edit-user", "method" => "post")); ?>

            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                
				<p>
                    <label for="subject">Subject*</label>
                    <input type="text" name="subject" id="subject" value="<?php echo set_value("subject", $data->subject); ?>" class="text-input medium-input"/>
                    <?php echo form_error("subject"); ?>
                </p>
                <p>
                    <label for="template">Templates*</label>
                    <textarea name="template" id="template"><?php echo set_value("template" ,$data->template); ?></textarea>
					<?php // echo display_ckeditor($ckconfig);?>
					<?php echo form_error("template"); ?>
                </p>
                <p>
                    <input type="submit" value="Submit" class="button">
					<input type="hidden" value="<?php echo $data->id?>" name="id">
                </p>

            </fieldset>

            <div class="clear"></div><!-- End .clear -->

            <?php echo form_close(); ?>

        </div> <!-- End #tab2 -->        

    </div> <!-- End .content-box-content -->
</div>