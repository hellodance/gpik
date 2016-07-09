<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
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
    <?php 
    $model = new LoginForm;
    $this->widget('bootstrap.widgets.TbModal', array(
'id' => 'myModal',
'header' => '<h3 id="myModalLabel">Sign In</h3>',
'content'=> $this->renderPartial('userlogin',array('model'=>$model),true),
'remote' => $this->createUrl('site/userlogin'),
        'onShow'=>'function(){
    $("#login-form")[0].reset();
    }',
 'show'=>false,
 'footer'=>false,

)); ?>
    
<?php $forgot = new Forgotpass;
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'forgot-pass',
'header' => '<h3>Forgot password</h3>',
'content'=> SiteController::renderPartial('_forgotpass',array('model'=>$forgot),true),//'adasdasdasd',//
 'show'=>false,
     'onShow'=>'function(){
    $("#forgotpass-form")[0].reset();
    }',
 'footer'=>'',
    'onHidden'=>'function(){ }',
     'htmlOptions'=>array('class'=>'forgot'),
'footer' =>false,
)); ?>
     <?php 
    $trainer = new TrainerDetails;
    $this->widget('bootstrap.widgets.TbModal', array(
'id' => 'myModal3',
'header' => '<h3 id="myModalLabel">Registration</h3>',
'content'=> $this->renderPartial('trainerform',array('model'=>$trainer),true),
//'remote' => $this->createUrl('users/create'),
//'options' =>array('remote' => 'site/userlogin'),
'onShow'=>'function(){
    $("#trainer-details-form")[0].reset();
    }',
 'show'=>false,
        'footer'=>FALSE,
/*'footer' => array(
TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
TbHtml::button('Close', array('data-dismiss' => 'modal')),
),*/
)); ?>
<?php 
    $model2 = new Users;
    $this->widget('bootstrap.widgets.TbModal', array(
'id' => 'myModal1',
'header' => '<h3 id="myModalLabel">Registration</h3>',
'content'=> $this->renderPartial('create',array('model'=>$model2),true),
'remote' => $this->createUrl('users/create'),
       'show'=>false,
        'onShow'=>'function(){
    $("#type_id").css("display","none");
    $("#users-form")[0].reset();
    }',
        'footer'=>FALSE,

)); ?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
'id' => 'myModal8',
'header' => '<h4 id="myModalLabel">Search Fitness Professionals</h4>',
'content'=> $this->renderPartial('searchtrainer','',true),
 'show'=>false,
 'footer'=>false,

)); ?>
<div id="header">
     <?php $this->widget('Header');?>
</div>
    
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                'fade'=>true,
                'closeText'=>'×', //'<button type="button" class="close">×</button>',
               'htmlOptions'=> array('class'=>'tbmain-alert comman-popUp')
                )); ?>
    <div class="row-fluid">
	<div class="container">
    	<?php echo $content ; ?> 
    </div>
  </div>
   
    
    <div id="footer">
     <?php $this->widget('Footer');?>
</div>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/citycombo.js"></script>
<div class="copyr">Copyright © 2013 - 2014. All Rights Reserved. </div>
<?php Yii::app()->bootstrap->registerAllScripts(); ?>
    </body>
</html>
<script>
   $(document).ready(function(){
   if ($('.tbmain-alert').length >0) {
        $(this).css('z-index','999999');
    $('#overlays').fadeIn(300);
   }else{
       
   }
   $(document).on('click','.alert .close',function(){
       $('#overlays').fadeOut(300, function(){
        $('.expose').css('z-index','1');
    });
   })
    $(document).on('click','.cp-f',function(){
       $('#overlays').fadeOut(300, function(){
        $('.expose').css('z-index','1');
    });
   })
});

</script>