<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<?php $this->setPageTitle("Gympik- An end-to-end free online platform to help improving lifestyle choices.");?>

<div id="error404">
    <div class="site-errors row-fluid">
       <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inner-banner.jpg">-->
    </div>


<h1 style="float: none"><span>Oops! <?php echo $code; ?></span></h1>
<h3><?php echo CHtml::encode($message); ?></h3>
<h5>It’s looking like you may have taken a wrong turn.</h5>
<h5>Don’t worry... it happens to the best of us.</h5>
<div id="innerMenu">
<h5>Here’s a little map that might help you get back on track:</h5>
<ul>
<li><a href="<?php echo Yii::app()->params->siteUrl; ?>" ><span>Go to Home</span></a></li>
<li><?php ?><a href="<?php echo Yii::app()->createUrl('site/how'); ?>" title="How it Works"><span>How it works</span></a></li>
<li><a href="<?php echo Yii::app()->createUrl('site/about') ; ?>" title="About: Our Story"><span>About Gympik</span></a></li>
<li><a href="<?php echo Yii::app()->createUrl('site/why'); ?>" ><span>Why Gympik</span></a></li>
<li><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" title="Contact: Your Best Decision"><span>Contact</span></a></li>
<li><a href="<?php echo Yii::app()->createUrl('site/healthguide'); ?>" title="Contact: Get some refreshing guides"><span>Health Guide</span></a></li>
<li><a href="<?php echo Yii::app()->createUrl('site/trainers'); ?>" ><span>Fitness Professionals</span></a></li>
<li><a href="http://gympik.wordpress.com" ><span>Blog</span></a></li>
</ul>
</div>
</div>
