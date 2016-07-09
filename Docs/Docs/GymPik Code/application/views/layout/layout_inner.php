<?php $this->commonmodel->cookieHandler();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<style type="text/css">
@import url("<?php echo base_url();?>css/gympik.css");
@import url("<?php echo base_url();?>css/fonts.css");
@import url("<?php echo base_url();?>css/jquery-ui.css");
@import url("<?php echo base_url();?>css/colorbox.css");
</style>
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/additional-methods.js"></script>
<script>
$(document).ready(function(){$(".ajaxpop_small").colorbox();});
</script>
</head>

<body>
<div id="loader" style="display:none;"></div>
<div id="wrapper">
	<div id="header">
    	<strong><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo_trans.png" width="189" height="63" alt="" /></a></strong>
        <div class="top-nav">
        	<ul>
            	<!--<li><a href="<?php echo base_url();?>how_works">How it works</a></li>-->
                <li><a href="<?php echo base_url();?>trainer/find" class="ajaxpop_small">Find your trainer</a></li>
                <li><a href="<?php echo base_url();?>why_gympik">Why Gympik</a></li>
                <li><a href="<?php echo base_url();?>blog">Blog</a></li>
                <li><a href="<?php echo base_url();?>trainer">Trainers</a></li>
            </ul>
        </div>
		<?php 
		if(isset($this->site_santry->get_auth_data()->id) && $this->site_santry->get_auth_data()->id != ''){
		?>
			<?php echo $this->commonmodel->user_pic($this->site_santry->get_auth_data()->id)?>
			<div class="user-area">
				<?php if($this->site_santry->get_auth_data()->role == 1){ ?>
					<a href="<?php echo base_url();?>user/dashboard" class="signin"><span>My account</span></a>
				<?php }else{?>
					<a href="<?php echo base_url();?>trainer/dashboard" class="signin">
					<span>My account</span></a>
				<?php }?>
				<a href="<?php echo base_url();?>user/logout" class="reg "><i></i><span>Logout</span></a>
			</div>
			
		<?php }else{?>
			<div class="user-area">
				<a href="<?php echo base_url();?>user/login"  class="signin ajaxpop_small" ><i></i><span>Sign-in</span></a>
				<a href="<?php echo base_url();?>user/register" class="reg ajaxpop_small" ><i></i><span>Register</span></a>
			</div>
		<?php }?>
    </div>
  <div id="container">
  	<?php echo $content_for_layout?>
  </div>	
</div>
<div id="footer">
	<div class="f-wrapper">
      <div style="float:left; width:70%">
		  <ul class="flinks marin3">
			  <li><a href="<?php echo base_url();?>about_us">About us</a></li>
		 <!-- <li><a href="<?php echo base_url();?>how_works">How it works</a></li> -->
				<li><a href="<?php echo base_url();?>faq">FAQ</a></li>
				<li><a href="<?php echo base_url();?>career">Careers</a></li>
				<li><a href="<?php echo base_url();?>contact_us">Contact us</a></li>
		  </ul>
	  </div>
	  <div style="float:right;width:30%; text-align:right;">
		<a target="blank" href="<?php echo $this->commonmodel->load_setting('facebook');?>">
			<img src="<?php echo base_url();?>images/fb.png">
		</a>
		<a target="blank" href="<?php echo $this->commonmodel->load_setting('twitter');?>">
			<img alt="" src="<?php echo base_url();?>images/tw.png">
		</a>
		<a target="blank" href="<?php echo $this->commonmodel->load_setting('pinterest');?>">
			<img alt="" src="<?php echo base_url();?>images/pi.png">
		</a>
	  </div>
	  
	  <div class="clear"></div>
	  <?php if($this->commonmodel->load_setting('footer_desc_text') != ''){?>
      	<p class="marin4"><?php echo $this->commonmodel->load_setting('footer_desc_text');?></p>
      <?php }?>
        <div class="f-strip">
        	<div class="floatl"><a href="#">Term of use</a> | <a href="#">Privacy &amp; Security</a> </div>
            <div class="floatr"><?php echo $this->commonmodel->load_setting('footer_text');?></div>
        </div>
  </div>

</div>
</body>
</html>
