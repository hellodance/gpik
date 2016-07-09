  <div id="sign_up">
    <table width="100%" border="0" cellspacing="16" cellpadding="0">
      <tr>
        <td align="left" valign="top">
		<?php echo validation_errors(); ?>
		<?php $attributes = array('class' => '', 'id' => 'fp','name'=>'fp','enctype'=>'multipart/form-data'); ?>
		<?php echo form_open('user/forgot_pass' ,$attributes); ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="top" class="popupTitle">Forgot Password <a href="#" id="close_x2" class="close"><img src="<?php echo base_url()?>images/close-icon.png" width="20" height="20" alt="" /></a></td>
            </tr>
            <tr>
              <td height="35" colspan="3" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top">
			  <input type="text" class="user err" placeholder="Email" name="email_fp" id="email_fp"  />
			  </td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="19" height="19" alt="" /></td>
            </tr>
                        <tr>
              <td height="15" colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
            </tr>
            <tr>
              <td width="4%" align="center" valign="top">&nbsp;</td>
              <td width="25%" align="left" valign="top" style="padding-left:100px;"><input type="submit" name="submit" id="submit" value="submit" class="sign-btn" /></td>
            </tr>
            <tr>
              <td height="18" colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="18" height="18" alt="" /></td>
            </tr>
            
                </table></td>
            </tr>
          </table>
		<?php echo form_close(); ?> 
		  </td>
      </tr>
    </table>
  </div>


<script>
$().ready(function(){
	$("#fp").validate({
		rules: {
			email_fp:{
				required: true, email : true
			}
			
		},
		highlight: function(element) {
			$(element).closest('.err').removeClass('error').addClass('sucess');
		},
		success: function(element) {
			element
			.text('ok').addClass('sucess')
			.closest('.err').removeClass('error').addClass('success');
	   }
	});
	
	$("#close_x2").click(function() {
            parent.$.colorbox.close();
            return false;
    })
});
</script>