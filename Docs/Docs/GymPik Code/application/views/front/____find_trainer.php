<div id="trainer_up">
<table width="100%" border="0" cellspacing="16" cellpadding="0">
  <tr>
    <td align="left" valign="top">
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data','method'=>'get'); ?>
	<?php echo form_open('trainer/find' ,$attributes); ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center" valign="Top" class="popupTitle">Search Trainer<a href="#" id="close_x" class="close"><img src="<?php echo base_url()?>images/close-icon.png" width="20" height="20" alt="" /></a></td>
      </tr>
      <tr>
        <td height="35" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/tab.jpg" width="277" height="38" alt="" /></td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input class="address-box err" placeholder="Address" type="text" name="add" id="add" /></td>
          </tr>
          <tr>
            <td><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><input class="search-fild err" placeholder="City" type="text" name="city" id="city" /></td>
                <td align="right" valign="top"><input class="search-fild err" placeholder="Locality" type="text" name="locality" id="locality" /></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
                </tr>
              <tr>
                <td align="left" valign="top"><input class="search-fild err" placeholder="Pincode" type="text" name="pincode" id="pincode" /></td>
                <td align="right" valign="top"><div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Trainer type" name="trainer_type" id="trainer_type">                    
					<option value="">Trainer type</option>
					<option value="Physical Trainer">Physical Trainer</option>
					<option value="Nutritionist/Dietician ">Nutritionist/Dietician</option>
					<option value="Physiotherapist ">Physiotherapist</option>
					<option value="Yoga Instructor ">Yoga Instructor</option>
					<option value="Aerobics">Aerobics</option>
					<option value="Martial Arts ">Martial Arts</option>

                </select>
                </div></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
                </tr>
              <tr>
                <td align="left" valign="top">
                <div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Trainer preference" name="gender" id="gender">                    <option value="">Trainer preference</option>
					<option value="1">Male</option>
					<option value="0">Female</option>
                </select>
                </div>
                </td>
                <td align="right" valign="top">
				<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Select one" name="schedule" id="schedule">                    <option value="everyday">Everyday</option>
					<option value="3 days a week ">3 days a week</option>
					<option value="4 times a month ">4 times a month</option>
                </select>
                </div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="12" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="12" height="12" alt="" /></td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="54%" align="left" valign="middle">Do you need a dietician consult</td>
            <td width="5%" align="left" valign="middle"><input type="radio" name="diet" value="1" /></td>
            <td width="11%" align="left" valign="middle">Yes</td>
            <td width="4%" align="left" valign="middle"><input type="radio" name="diet" value="0" /></td>
            <td width="26%" align="left" valign="middle">No</td>
            
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="15" align="center" valign="top"><img src="<?php echo base_url()?>images/spacer.png" width="19" height="19" alt="" /></td>
      </tr>
      <tr>
        <td height="50" align="left" valign="top">
        <div style="position:relative;">
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
	$("#close_x").click(function() {
            parent.$.colorbox.close();
            return false;
    })
	
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

