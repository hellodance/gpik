<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="row1">
<?php //$results = Yii::app()->facebook->api('/me') ;
     //   print_r($results)?>
    <button class="f-button" >Sign in with Facebook</button><div class="ajaxloader" style="display:none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajaxloader.gif" alt="" style="width: 6%;"/></div>
    </div>
 <div class="or-div"><span>OR</span></div>

<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
          'action'=>Yii::app()->createUrl('site/userlogin'),  
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<ul class="login pad1">
            <?php echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>255)); ?>
        <li>
          <div class="column1">
            <?php // echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php// echo $form->error($model,'rememberMe'); ?>
              <?php echo TbHtml::link("Don't have an Account?", '#', array(
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal1',
                                            'data-dismiss' => 'modal'
                                            ));?><br />
             <a href="#">Forgot Password</a>
            </div>
         
          <div class="column2">
              
            <?php echo TbHtml::submitbutton('Sign In',array('class'=>'btn btn-primary')); ?>
          </div>
        </li>
      </ul>

<?php $this->endWidget(); ?>
 
<!-- form -->
<script>
  /*  $(document).ready(function(){
        window.fbAsyncInit = function() {
    FB.init({
      appId      : '1417032088525613', // App ID
      channelUrl : '//area51.co.in/project/gympic/', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));*/
     $(document).on('click','.f-button',function() {
        FB.login(function(response) {
              console.log(response);
              $('.ajaxloader').css('display','inline');
                $.ajax({
                  url:'<?php echo $this->createUrl('site/fblogin'); ?>',
                  data:'',
                  method:'POST',
                  success:function(){
                    $('.ajaxloader').css('display','none');
                    $('.close').click();
                    window.location = '<?php echo $this->createUrl('site/fblogin'); ?>' ;
                    }
              })
            }, {scope:'read_stream,publish_stream,offline_access'});
          });
        //  });
        </script>
