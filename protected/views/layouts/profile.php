<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Gympik- An end-to-end free online platform to help improving lifestyle choices.</title>
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
<body>
<div id="header">
     <?php $this->widget('Header');?>
</div>
<div id="banner">
<div class="sliderFram"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/banner-btm.png" alt="" /></div>
<div id="slider">
    <div class="image-slider">
      <ul class="slides">
        <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb.jpg" alt="" width="2000" height="553"></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_002.jpg" alt="" width="2000" height="553"></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_003.jpg" alt="" width="2000" height="553"></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_004.jpg" alt="" width="2000" height="553"></li>
      </ul>
    </div>
    <div class="text-slider">
      <ul>
        <li>
          <h2>Find Your Coach/Specialist</h2>
          <p>Whether you wish to exercise to reduce fat, do weight training to gain muscle, or increase your strength & flexibility to enhance your lifestyle, GymPik lets you select a coach to match your schedule and location.</p><p> All you need to do is register your details and start searching from our extensive database! </p></li>
        <li>
          <h2>Eat Right</h2>
          <p>Burn calories, fight fat and increase your metabolism – you may not know it, but the but key for eberything lies in eating right. Get a what-to-eat plan or hire a nutritionist to complement your workout or weight-watching routine.</p><p> Match it with your fitness goal to enhance your physical contour. </p>
          </li>
        <li>
          <h2>Look Better, Live Better</h2>
          <p>Personal training, lifestyle coaching, injury recovery, bodybuilding, cardiovascular exercises, prenatal workout, losing weight, gaining strength, customized supplement programs, tracking your diet – whatever you need, you will find at GymPik. Your personal source for free health and nutrition advice, with innovative and easy-to-use tools to help you get (and remain!) fit.</p>
        </li>
          <li>
<!--          <h2>Regular Workout Difference</h2>-->
          <p style="font-size: 13px; line-height: 1.8">
                  "An ad hoc exercise routine will only help you lose or gain a few pounds. A regular workout with a specialist will improve your health for the lifetime."<br /><br />
                  "Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?"</p>
        </li>
      </ul>
    </div>
    <div class="elements"> 
        <span style="display: inline;" class="white-box"></span>
        <span class="top-corner"></span>
        <span class="bottom-corner"></span>
    </div>
    <ul style="display: block;" class="flex-direction-nav">
      <li><a class="flex-prev" href="#"></a></li>
      <li><a class="flex-next" href="#"></a></li>
    </ul>
  </div>
  </div>
<div id="content-area" class="mrgn">
	<?php echo $content; ?>
</div>
<div id="footer">
     <?php $this->widget('Footer');?>
</div>
<div class="copyr">Copyright © 2013 - 2014. All Rights Reserved. </div>
<?php Yii::app()->bootstrap->registerAllScripts(); ?>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/slider/jquery_002.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/slider/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/slider/jquery_011.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/citycombo.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/typeahead.js"></script>
    
</body>
</html>
