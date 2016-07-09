<div class="clear topPad40">&nbsp;</div>
<?php echo $this->layout->element("front/notification"); ?>
<div class="contantleft" style=" text-align:justify">
<h3 >Careers</h3>
<p>Congratulations! Since you have made this far it seems you are genuinely interested in improving your lifestyle. It is no secret that regular exercise and balanced diet helps you gain healthy life longevity. Since our childhood we all are taught about regular exercise benefits such as reduced risk of chronic disease, elevated mood, increased self esteem, improved confidence and much more. It’s so common to hear stories about someone who has joined gym or tried relentlessly to loose weight but nothing seems to work. The key problems remain are regularity, planning, accountability and above all motivation!
</p>
<p>
GymPik helps you fulfil the gap and stay on course. At GymPik, we obsess with healthy lifestyle. We believe a healthy lifestyle is a choice and not some crash course to keep you fit in a dress for one evening! In our efforts and personal life experiences, we found most of the fitness programs fail due to fundamental problems. There is no one fit for all magic formula which can be told. Every individual is different and hence one needs a focussed approach to help achieve and maintain the fitness goal. 
</p>
<p>
At GymPik we offer a cohesive easy-to-use online platform, complemented with smart phone and tablet apps, for users to Plan
<img src="<?=base_url();?>images/arw.png" height="10"> Track <img src="<?=base_url();?>images/arw.png" height="10"> Measure <img src="<?=base_url();?>images/arw.png" height="10"> Improve progress regularly. Additionally, you can search for a fitness instructor, including Physical Fitness, Dietician, Physiotherapist, Aerobics and Martial Arts, to help you at your doorstep. And all this absolutely FREE!!
</p>

</div>
<div class="contantright" style="padding-top:5px;">
<div class="right-img">
<div class="rightmenu">
<h2>Send your resume</h2>
</div>
<div style=" margin:30px 18px;" >
<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'career','name'=>'career','enctype'=>'multipart/form-data'); ?>
<?php echo form_open('career' ,$attributes); ?>
	
	<ul id="contact"  >
		<li>&nbsp;</li>
	    <li>Name</li><li><input type="text" id="name" name="name" class="inputTxt err "></a></li>
		<li>Email</li><li><input id="email" type="text" name="email" class="inputTxt err"></li>
		<li>Upload Resume</li><li><input id="resume" type="file"  name="resume" class="inputFile"></li>
        
		<li>How much is 4 x 3</li><li><input id="captcha" type="text" name="captcha"class="inputTxt err"></li>
		<li>&nbsp;</li><li><span>
		<input class="follow" type="submit" value="submit" name="submit"/>
		</span></li>
	</ul>
	<?php echo form_close(); ?>

</div>



</div>
</div>
</div>
</div>





<script>
$().ready(function(){
	$("#career").validate({
		rules: {
		    name: {
				required: true 
			},
			email: {
				required: true,email:true
			},
			resume:{
				required: true, extension2: "docx|doc|pdf"
			},
			captcha:{
				required: true ,number : true,maxlength: 3 
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

