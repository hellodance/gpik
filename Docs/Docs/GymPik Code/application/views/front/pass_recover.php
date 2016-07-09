
<div class="clear topPad40"></div>

<div style="padding:10px 50px">
<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'pr','name'=>'pr','enctype'=>'multipart/form-data'); ?>
<?php echo form_open('user/pass_recover/'.$encyp ,$attributes); ?>
	<ul id="contact">
	  <li>New Password</li>
	  <li><input type="password" class="inputTxt err" name="pas" id="pas"></li>
	  <li>Confirm Password</li>
	  <li><input type="password" class="inputTxt err" name="pas2" id="pas2"></li>
	  
	  <li><input type="submit" class="sign-btn" name="submit" value="Submit"></li>
	
	</ul>
<?php echo form_close(); ?> 
</div>
<script>
$().ready(function(){
	$("#pr").validate({
		rules: {
			pas:{
				required: true,minlength: 6
			},
			pas2:{
				required: true,minlength: 6,equalTo: "#pas"
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