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
                    <label for="subject">FAQ*</label>
                    <input type="text" name="faq" id="faq" value="" class="text-input medium-input"/>
                    <?php echo form_error("faq"); ?>
                </p>
                <p>
                    <label for="template">Ans.*</label>
                    <textarea name="faq_ans" id="faq_ans"></textarea>
					
					<?php echo form_error("faq_ans"); ?>
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