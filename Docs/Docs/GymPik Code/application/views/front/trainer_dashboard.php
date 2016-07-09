<div class="clear topPad40">&nbsp;</div>
<h3>Trainer Dashboard</h3>
<div id="LeftMenu"></div>
<div id="txtContainer2"></div>
<!-- Execution only if trainer have not completed his/her profile -->
<?php $userID = $this->site_santry->get_auth_data()->id;
	  if($this->commonmodel->profile_staus($userID)== 0 ){?>
			<a href="<?php echo base_url()?>trainer/incomplete_profile" class="ajax"></a>
			<script>
			$(document).ready(function(){
				$(".ajax").colorbox();
				$("a.ajax").colorbox({open:true,escKey:false,overlayClose:false});
			});
			</script>
<?php }?>
<!-- ends here -->
