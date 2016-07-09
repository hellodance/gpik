<div id="reg_up" style="background-color:#F3F3F3;">
<table width="100%" border="0" cellspacing="16" cellpadding="0">
  <tr>
    <td align="left" valign="top">
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data'); ?>
	<?php echo form_open('user/incomplete_profile' ,$attributes); ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center" valign="top" class="popupTitle">Complete your Profile</td>
      </tr>
      <tr>
        <td height="35" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
         	<input type="text" placeholder="Address" class="input-box err" name="add" id="add" /></td>
      </tr>
      <tr>
        <td height="12" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px"valign="top">
			<input class="input-box err" placeholder="Pincode" type="text" name="pincode" id="pincode" /></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<input class="input-box err" placeholder="Weight" type="text" name="weight" id="weight" />
		</td>
      </tr>
	  <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<input class="input-box err" placeholder="Height" type="text" name="height" id="height" />
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<textarea id="desc" name="desc" class="textarea err" placeholder="Description (about urself)"></textarea>
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<textarea id="alle" name="alle" class="textarea err" placeholder="Medical history/allergies "></textarea>
		</td>
      </tr>

      <tr>
        <td height="25" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="18" height="18" alt="" /></td>
      </tr>
      <tr>
        <td height="50" align="center" valign="top">
        <div style="position:relative; margin:0px auto; text-align:center;" align="center">
		<input type="submit" class="sign-btn" name="button" id="button" value="Submit" />
		<input type="button" class="sign-btn" onclick="location.href='<?php echo base_url()?>home'" name="cancel" id="cancel" value="Cancel" />
		</div>
        </td>
      </tr>
    </table>
	<?php echo form_close(); ?>
	
	</td>
  </tr>
</table>

</div>

<script>
$().ready(function(){
	$("#reg").validate({
		rules: {
			add: {
				required: true
			},
			pincode: {
				required: true,number : true,maxlength: 6 
			},
			weight:{
				required: true 
			},
			height:{
				required: true 
			},
			desc:{
				required: true
			},
			alle :{
				required: true
			}
		},
		highlight: function(element) {
			$(element).closest('.input-box').removeClass('error').addClass('sucess');
		},
		success: function(element) {
			element
			.text('ok').addClass('sucess')
			.closest('.input-box').removeClass('error').addClass('success');
	   }
		
	});
	
	
	// select element styling
	$('select.select').each(function(){
		var title = $(this).attr('title');
		if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		$(this)
		.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		.after('<span class="select">' + title + '</span>')
		.change(function(){
		val = $('option:selected',this).text();
		$(this).next().text(val);
		})
	});
	
});
</script>
