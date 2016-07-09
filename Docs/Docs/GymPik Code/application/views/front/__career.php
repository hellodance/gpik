<div class="clear">&nbsp;</div>
<div style="width:100%;">
	<h2 class="marin5">Careers</h2>
	<div class="gympik_text" style="width:70%; float:left;">
<p style=" text-align:justify">	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
	</div>




<div style="float:right; width:26%">
	<p style="font-size:18px;">Gorw your career with us.</p>
	<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'contact','name'=>'contact','enctype'=>'multipart/form-data'); ?>
<?php echo form_open('contact_us' ,$attributes); ?>
	
	<ul id="contact"  >
		<li>&nbsp;</li>
	    <li>Name</li><li><input type="text" id="name" name="name" class="inputTxt err "></a></li>
		<li>Email</li><li><input id="email" type="text" name="email" class="inputTxt err"></li>
		<li>Upload Resume</li><li><input id="subject" type="file"  name="subject" class=""></li>
        
		<li>How much is 4 x 3</li><li><input id="captcha" type="text" name="captcha"class="inputTxt err"></li>
		<li>&nbsp;</li><li><span>
		<input class="follow" type="submit" value="submit" name="submit"/>
		</span></li>
	</ul>
	<?php echo form_close(); ?>

</div>



</div>