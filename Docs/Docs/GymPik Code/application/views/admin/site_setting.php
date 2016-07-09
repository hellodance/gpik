<div class="content-box">
	<!-- Start Content Box -->
    <div class="content-box-header">
        <h3 style="cursor: s-resize;"><?php echo isset($title) ? $title : "Admin "; ?></h3>
        <div class="clear"></div>
    </div> 
	<!-- End .content-box-header -->
   <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab">

            <?php echo form_open(null, array("id" => "setting-edit", "method" => "post")); ?>
            <fieldset> 
				<?php foreach($settings as $set){?>	
				<p>
                    <label for="username"><?php echo str_replace('_',' ',$set->key);?></label>
                    <?php if($set->type == 'text'){?>
					<input type="text" name="setting[<?=$set->id?>]"  value="<?php echo set_value("value", $set->value); ?>" class="text-input medium-input"/>
                    <?php }else{?>
					<textarea name="setting[<?=$set->id;?>]" > <?php echo trim(set_value("value", $set->value)); ?></textarea>
					<?php }?>
                </p>
				<?php } //endforeach?>
                <p>
                    <input type="submit" value="Submit" class="button">
                </p>
            </fieldset>
            <div class="clear"></div><!-- End .clear -->
            <?php echo form_close(); ?>
        </div> <!-- End #tab2 -->        
    </div> <!-- End .content-box-content -->
</div>