 
  <div id="sign_up">
    <table width="100%" border="0" cellspacing="16" cellpadding="0">
      <tr>
        <td align="left" valign="top">
		<?php echo validation_errors(); ?>
		<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data'); ?>
		<?php echo form_open('user/login' ,$attributes); ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="top" class="popupTitle">Sign In <a href="#" id="close_x" class="close"><img src="<?php echo base_url()?>images/close-icon.png" width="20" height="20" alt="" /></a></td>
            </tr>
            <tr>
              <td height="35" colspan="3" align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top">
			  <input type="text" class="user err" placeholder="Email" name="email" id="email"  value="<?php echo $unam;?>" />
			  </td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="19" height="19" alt="" /></td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="top">
			  <input class="pass err" type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $pass;?>" />
			  </td>
            </tr>
            <tr>
              <td height="15" colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
            </tr>
            <tr>
              <td width="4%" align="center" valign="top">&nbsp;</td>
              <td width="71%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="9%" align="left" valign="middle">
						<input type="checkbox" name="rem_me" id="rem_me" value="yes" />
					</td>
                    <td width="91%" align="left" valign="middle">Remember me </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="middle"><a class="link ajaxpop_small" href="<?php echo base_url()?>user/forgot_pass"> Forgot Password </a>
					</td>
                  </tr>
                </table>
                <label for="checkbox"></label></td>
              <td width="25%" align="left" valign="top"><input type="submit" name="button" id="button" value="Login" class="sign-btn" /></td>
            </tr>
            <tr>
              <td height="18" colspan="3" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="18" height="18" alt="" /></td>
            </tr>
            <tr>
              <td colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><a href="<?php echo base_url('facebook')?>"><img src="<?php echo base_url()?>images/f-button.png" width="203" height="41" alt="" /></a></td>
                    <td align="left" valign="top"><a href="#"><img src="<?php echo base_url()?>images/g-button.png" width="203" height="41" alt="" /></a></td>
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
	$("#reg").validate({
		rules: {
			email:{
				required: true,email : true
			},
			pass :{
				required: true
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
	
	$("#close_x").click(function() {
            parent.$.colorbox.close();
            return false;
    })
	$(".ajaxpop_small").colorbox();
});

</script>