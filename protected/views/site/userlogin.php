<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<style>
    
</style>
<div class="row1">
    <button class="f-button" >Sign in with Facebook</button><div class="ajaxloader" style="display:none"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ajaxloader.gif" alt="" style="width: 6%;margin: 0 0 0 10px;"/></div>
    </div>
 <div class="or-div"><span>OR</span></div>

<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
        //'helpType'=>'help-none',
          'action'=>Yii::app()->createUrl('userlogin'), 
          //'enableAjaxValidation' => false,
	'enableClientValidation'=>true,
	'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange'=>false,
            'afterValidate' => 'js:function(form, data, hasError) {
                if (!hasError){
                    str = $("#login-form").serialize() + "&ajax=login-form";
 
                    $.ajax({
                        type: "POST",
                        url: "' . Yii::app()->createUrl('site/userlogin') . '",
                        data: str,
                        dataType: "json",
                        beforeSend : function() {
                            $("#login").attr("disabled",true);
                        },
                        success: function(data, status) {
                            if(data.authenticated)
                            {
                                window.location = data.redirectUrl;
                            }
                            else
                            {
                                $.each(data, function(key, value) {
                                    var div = "#"+key+"_em_";
                                    $(div).text(value);
                                    $(div).show();
                                });
                                $("#login").attr("disabled",false);
                            }
                        },
                    });
                    return false;
                }
            }',
        ),
    ));?>

	<ul class="login pad1">
            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255,'required'=>true)); ?>
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>255,'required'=>true)); ?>
        <li>
          <div class="column1">
            <?php // echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe',array('class'=>'checkbox')); ?>
		<?php // echo $form->error($model,'rememberMe'); ?>
              <!--<a href="#">Forgot Password</a>-->
              <?php echo TbHtml::link("Forgot Password", '#', array(
                                            'data-toggle' => 'modal',
                                            'data-target' => '#forgot-pass',
                                            'data-dismiss' => 'modal'
                                            ));?>
              <?php //echo CHtml::link('Forgot Password', array('site/forgotpass')) ?>
              <br />
              <?php echo TbHtml::link("Don't have an Account?", '#', array(
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal1',
                                            'data-dismiss' => 'modal'
                                            ));?>
              
              
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
                  data:{data:response},
                  method:'POST',
                  success:function(){
                    $('.ajaxloader').css('display','none');
                    $('.close').click();
                    window.location = '<?php echo $this->createUrl('site/fblogin'); ?>' ;
                    },
                    error:function(err){
                        $('.ajaxloader').css('display','none');
                        console.log(err)
                        window.location = '<?php echo $this->createUrl('site/index'); ?>' ;
                    }
              })
            },{scope:'read_stream,email,offline_access,user_about_me,user_location'});
          });
        //  });
        </script>
