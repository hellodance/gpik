<div id="reg_up" style="background-color:#F3F3F3;">
<table width="100%" border="0" cellspacing="16" cellpadding="0">
  <tr>
    <td align="left" valign="top">
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data'); ?>
	<?php echo form_open('user/register' ,$attributes); ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center" valign="top" class="popupTitle">New User Registration <a href="#" id="close_x" class="close"><img src="<?php echo base_url()?>images/close-icon.png" width="20" height="20" alt="" /></a></td>
      </tr>
      <tr>
        <td height="35" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
         	<input type="text" placeholder="First Name" class="input-box" name="fname" id="fname" /></td>
      </tr>
      <tr>
        <td height="12" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px"valign="top">
			<input class="input-box" placeholder="Last Name" type="text" name="lname" id="lname" /></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<input class="input-box" placeholder="Mobile No." type="text" name="mob_no" id="mob_no" />
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<input class="input-box" placeholder="Email" type="text" name="email" id="email" />
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
			<input class="input-box" placeholder="Password " type="password" name="pass" id="pass" />
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="left" style="padding-left:30px" valign="top">
		<input class="input-box" placeholder="Confirm Password" type="password" name="pass2" id="pass2" />
		</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="86%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" align="left" valign="middle">Birth Date</td>
            <td width="24%" align="left" valign="middle">
				<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select" title="Select one" name="dd" id="dd">
				<option>--</option>
				<?php for($i =1 ; $i < 32; $i++){?>
						<option value="<?php echo $i?>"> <?php echo $i;?></option>
				<?php }?>
                </select>
                </div>
            </td>
            <td width="24%" align="left" valign="middle">
				<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select" title="Select one" name="mm" id="mm">      		
				<option>--</option>
				<?php for($i =1 ; $i < 13; $i++){?>
						<option value="<?php echo $i?>"> <?php echo $i;?></option>
				<?php }?>
                </select>
                </div> </td>
            <td width="5%" align="left" valign="middle">&nbsp;</td>
            <td width="19%" align="left" valign="middle"> 
				<?php $currentYear = date('Y',time()) - 10;?>
				<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select" title="Select one" name="yy" id="yy">								 				<option>--</option>
				<?php for($i =1950 ; $i < $currentYear; $i++){?>
						<option value="<?php echo $i?>"> <?php echo $i;?></option>
				<?php }?>
                </select>
                </div></td>
            <td width="3%" align="left" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="86%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" align="left" valign="middle">Gender</td>
            <td width="7%" align="left" valign="middle"><input name="gender" type="radio" value="1" /></td>
            <td width="18%" align="left" valign="middle">Male</td>
            <td width="6%" align="left" valign="middle"><input name="gender" type="radio" value="0" /></td>
            <td width="44%" align="left" valign="middle">Female</td>
            
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="18" height="18" alt="" /></td>
      </tr>
      <tr>
        <td height="50" align="center" valign="top">
        <div style="position:relative; margin:0px auto; text-align:center;" align="center">
		<input type="submit" class="submit" name="button" id="button" value="" />
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
			fname: {
				required: true
			},
			lname: {
				required: true 
			},
			mob_no:{
				required: true 
			},
			email:{
				required: true,email : true
			},
			pass :{
				required: true,minlength: 6
			},
			pass2 :{
				required: true,minlength: 6,equalTo: "#pass"
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
	
	$("#close_x").click(function() {
            parent.$.colorbox.close();
            return false;
    })
	
	
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
