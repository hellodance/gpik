<style>
.search li { 
	display: inline; 
	float:left; 
	width:250px; 
	text-align:left;
	font-family:"Trebuchet",Arial,Helvetica,sans-serif !important;
	line-height:2.5em;
	margin-left:20px;
	font-size:16px;
	font-weight:500;
}
</style>
<div class="clear topPad40">&nbsp;</div>
<div style="float:left; width:70%">
	<p style="font-size:18px;">Please send us message if you have any suggestion or question.</p>
	<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'contact','name'=>'contact','enctype'=>'multipart/form-data'); ?>
<?php echo form_open('contact_us' ,$attributes); ?>
	
	<ul id="contact"  >
		<li>&nbsp;</li>
		<li>Email</li><li><input id="email" type="text" name="email" class="inputTxt err"></li>
		<li>Subject</li><li><input id="subject" type="text" name="subject" class="inputTxt err"></li>
		<li>Message</li><li><textarea id="message" name="message" class="textarea err "></textarea></li>
		<li>How much is 4 x 3</li><li><input id="captcha" type="text" name="captcha"class="inputTxt err"></li>
		<li>&nbsp;</li><li><span>
		<input class="follow" type="submit" value="submit" name="submit"/>
		</span></li>
	</ul>
	<?php echo form_close(); ?>

</div>
<div style="float:right; width:30%;">
	<div class="event">
<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=14th+cross,+first+phase,+J+P+Nagar+Bangalore+-+78&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=29.081881,62.138672&amp;ie=UTF8&amp;hq=&amp;hnear=78,+14th+Cross+Rd,+Phase+II,+J+P+Nagar,+Bangalore,+Bangalore+Urban,+Karnataka,+India&amp;ll=12.907188,77.588954&amp;spn=0.008722,0.015171&amp;t=m&amp;z=14&amp;output=embed"></iframe>
<div>  &nbsp;</div>
<div>Contact no : 99860 16910</div>
<div>email :&nbsp;<a href="mailto:contact@gympik.com" target="_blank">contact@gympik.com</a></div>
<h5 style="font-size:16px;" class="marin4">Gympik&nbsp;health solutions pvt ltd</h5>
<div>14th cross, first phase, J P Nagar</div>
<div>Bangalore - 78</div>
<div>India.</div>
</div>
</div>
<div class="clear">&nbsp;</div>

<script>
$().ready(function(){
	$("#contact").validate({
		rules: {
			email: {
				required: true,email:true
			},
			subject: {
				required: true 
			},
			message:{
				required: true 
			},
			captcha:{
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
	
	
	
});
</script>



