<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $this->config->item("site_name"); ?> | <?php echo isset($title) ? $title : "Admin "; ?></title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url("css/admin/reset.css"); ?>" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url("css/admin/style.css"); ?>" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?php echo base_url("css/admin/invalid.css"); ?>" type="text/css" media="screen" />
<!--Colour Schemes
	Default colour scheme is green. Uncomment prefered stylesheet to use it.
	<link rel="stylesheet" href="<?php echo base_url("css/admin/blue.css"); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url("css/admin/red.css"); ?>" type="text/css" media="screen" />  
	-->
<!-- Internet Explorer Fixes Stylesheet -->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php echo base_url("css/admin/ie.css"); ?>" type="text/css" media="screen" />
<![endif]-->
<!-- Javascripts -->
<!-- Cookie.js -->
<script type="text/javascript" src="<?php echo base_url("js/admin/cookie.js"); ?>"></script>
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url("js/admin/jquery-1.3.2.min.js"); ?>"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?php echo base_url("js/admin/simpla.jquery.configuration.js"); ?>"></script>
<!-- Facebox jQuery Plugin -->
<!--	<script type="text/javascript" src="<?php echo base_url("js/admin/facebox.js"); ?>"></script>-->
<!-- jQuery WYSIWYG Plugin -->
<!--	<script type="text/javascript" src="<?php echo base_url("js/admin/jquery.wysiwyg.js"); ?>"></script>-->
<!-- Internet Explorer .png-fix -->
<!--[if IE 6]>
	<script type="text/javascript" src="<?php echo base_url("js/admin/DD_belatedPNG_0.0.7a.js"); ?>"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('.png_bg, img, li');
	</script>
<![endif]-->
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar"> <?php echo $this->layout->element("admin/left_side_panel"); ?> </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly. </div>
    </div>
    </noscript>
    <!-- Page Head -->
    <h2><?php //echo isset($title) ? $title : "Admin "; ?></h2>
    <?php if(isset($page_intro)):?>
		    <p id="page-intro"><?php echo $page_intro; ?></p>
    <?php endif; ?>
    <!-- Start Notifications -->
    <!--attention,information,success,error -->
    <?php 
			$attention = $this->session->flashdata('attention');
			$information = $this->session->flashdata('information');
			$success = $this->session->flashdata('success');
			$error = $this->session->flashdata('error');
			$validation_errors = validation_errors();
			?>
    <?php if($attention != ""){?>
    <div class="notification attention png_bg"> <a href="#" class="close"><img src="<?php echo base_url("images/admin/icons/cross_grey_small.png"); ?>" title="Close this notification" alt="close" /></a>
      <div> <?php echo $attention; ?> </div>
    </div>
    <?php }elseif($information != ""){ ?>
    <div class="notification information png_bg"> <a href="#" class="close"><img src="<?php echo base_url("images/admin/icons/cross_grey_small.png"); ?>" title="Close this notification" alt="close" /></a>
      <div> <?php echo $information; ?> </div>
    </div>
    <?php }elseif($success != ""){ ?>
    <div class="notification success png_bg"> <a href="#" class="close"><img src="<?php echo base_url("images/admin/icons/cross_grey_small.png"); ?>" title="Close this notification" alt="close" /></a>
      <div> <?php echo $success; ?> </div>
    </div>
    <?php }elseif($error != "" || $validation_errors != ""){ ?>
    <div class="notification error png_bg"> <a href="#" class="close"><img src="<?php echo base_url("images/admin/icons/cross_grey_small.png"); ?>" title="Close this notification" alt="close" /></a>
      <div> <?php echo $error; ?>
        <?php if($validation_errors != ""): ?>
        Error occur in form submission
        <?php endif; ?>
      </div>
    </div>
    <?php } ?>
    <!-- End Notifications -->
    <?php echo $content_for_layout; ?>
    <div class="clear"></div>
    <!-- End .clear -->
    <!-- End Notifications -->
  </div>
  <!-- End #main-content -->
</div>
</body>
</html>
