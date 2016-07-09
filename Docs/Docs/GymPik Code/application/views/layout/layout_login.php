<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo doctype('xhtml1-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title><?php echo $this->config->item("site_name"); ?> | <?php echo isset($title) ? "Admin " . $title : "Admin "; ?></title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url("css/admin/reset.css"); ?>" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo base_url("css/admin/style.css"); ?>" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo base_url("css/admin/invalid.css"); ?>" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="<?php echo base_url("css/admin/blue.css"); ?>" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="<?php echo base_url("css/admin/red.css"); ?>" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo base_url("css/admin/ie.css"); ?>" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url("js/admin/jquery-1.3.2.min.js"); ?>"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo base_url("js/admin/simpla.jquery.configuration.js"); ?>"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo base_url("js/admin/facebox.js"); ?>"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo base_url("js/admin/jquery.wysiwyg.js"); ?>"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo base_url("js/admin/DD_belatedPNG_0.0.7a.js"); ?>"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo base_url("images/admin/new_logo.png");?>" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			<?php echo $content_for_layout; ?>	
		</div> <!-- End #login-wrapper -->
  </body>
  
</html>
