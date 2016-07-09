<div class="clear topPad40">&nbsp;</div>
<h3 >FAQ's</h3>
</br>
<div id="faqs">
 	
	<?php if(is_array($lists) && count($lists)>0) {?>
		  <?php foreach($lists as $faq){?>
				<h3><?php echo $faq->faq?></h3>
				<div class="gympik_text">
					<p>
					<?php echo $faq->faq_ans?>
					</p>
				</div>
	 	 <?php }//endforeach?>
	<?php }?>

</div>
 <script>
$(function() {
	var icons = {header: "ui-icon-circle-arrow-e", activeHeader: "ui-icon-circle-arrow-s"};
	$( "#faqs" ).accordion( {heightStyle: "content",icons: icons} );
});
</script>


