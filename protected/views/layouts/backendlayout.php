<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Gympik- An end-to-end free online platform to help improving lifestyle choices.</title>
<?php Yii::app()->bootstrap->registerAllScripts(); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/gympik.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap-responsive.css'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/overwrite.css'); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46152389-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body><div id="overlays"></div>
    
<div id="header">
     <?php $this->widget('Backendheader');?>
</div>
    <div id="content-area">
<div class="container inner">
    <?php echo $content ; ?> 
</div>
    <div class="stature-panel">
	<?php $this->widget('Stature');?>
</div>
    </div>
    <div id="footer">
     <?php //$this->widget('Footer');?>
</div>

    
<div class="copyr">Copyright © 2013 - 2014. All Rights Reserved.</div>
<?php Yii::app()->bootstrap->registerAllScripts(); ?>
    </body>
</html>
