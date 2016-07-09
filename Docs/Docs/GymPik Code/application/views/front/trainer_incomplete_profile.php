<div id="trainer_profile" style="background-color:#F3F3F3; min-height:510px;">
<div class="popupTitle" style="height:50px; line-height:50px; padding:0px 20px;">Complete your Profile</div>
<div class="clear"></div>
<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data'); ?>
<?php echo form_open('trainer/incomplete_profile' ,$attributes); ?>
<ul id="tra">
	<li><input type="text" name="add" class="inputTxt err" placeholder="Address"></li>
	<li><input type="text" name="pincode" class="inputTxt err" placeholder="pincode"></li>
	<li><input type="file" name="img" id="img" class="inputFile"></li>
	<li><select class="inputSelect err" title="Select one" name="speciality" id="speciality">
			<option value="">Please choose Secondary Speciality</option>
			<option value="Physical Trainer">Physical Trainer</option>
			<option value="Nutritionist/Dietician">Nutritionist/Dietician</option>
			<option value="Physiotherapist">Physiotherapist</option>
			<option value="Yoga">Yoga</option>
			<option value="Aerobics">Aerobics</option>
			<option value="Martial Arts">Martial Arts</option>
		</select>
	</li>
	<li><select class="inputSelect err" title="Select one" name="consult" id="consult">
			<option value="">Please choose distance for F2F consult </option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="8">8</option>
			<option value="10">10</option>
			<option value="15">15</option>
		</select>
	</li>
	<li><select class="inputSelect err" title="Select one" name="exper" id="exper">
			<option value="">Please choose experience  </option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="8">8</option>
			<option value="10">10</option>
			<option value="15">15</option>
		</select></li>
	<li><textarea id="desc" name="desc" placeholder="About me" class="textarea" style="width:235px;"></textarea></li>
	<li></li>
	<li>OTHER INFO</li><li>&nbsp;</li>
	<li><input type="text" name="cert" id="cert" class="inputTxt err" placeholder="Certifications"></li>
	<li><input type="text" name="fb_link" id="fb_link" class="inputTxt err" placeholder="Facebook link"></li>
	<li><input type="checkbox" name="group" id="group" value="1" class="err"> &nbsp;Can take group activities </li>
	<li></li>
</ul>
<div style="position:relative; margin:0px auto; text-align:center;" align="center">
<input type="submit" class="sign-btn" name="button" id="button" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" class="sign-btn" onclick="location.href='<?php echo base_url()?>home'" name="cancel" id="cancel" 
value="Cancel" />
</div>
<?php echo form_close(); ?>
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
			img :{
				required: true, accept: "png|jpe?g|gif", filesize: 1048576 
			},
			speciality:{
				required: true 
			},
			consult:{
				required: true 
			},
			exper:{
				required: true
			},
			desc :{
				required: true
			},
			cert:{
				required:true
			},
			fb_link:{
				required:true,url:true
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
	
});
</script>
