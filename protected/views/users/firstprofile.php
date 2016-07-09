<!--<div class="form">-->
<div class="loader" style="display: none;position: absolute;top: 50%;left: 50%;z-index: 999999;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/ajaxloader.gif" ></div>

<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'first-reg',
'header' => '<h3>User Details</h3>',
'content'=> $this->renderPartial('profile_form',array('model'=>$model,'details'=>$details),true),//'adasdasdasd',//
//'remote' => $this->renderPartial('_form',array('model'=>$model),true),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>true,
    'onHidden'=>'function(){ 
                       $(".client-area").find("a")[1].click();
                        }',
 'footer'=>'',
    'closeText'=>false,
//    'backdrop'=>false,
    'keyboard'=>false,
    
     'htmlOptions'=>array('class'=>'user-modal',
//         'style'=>'z-index:9999'
         ),
'footer' => array(

TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),
TbHtml::submitButton('Submit', array('id'=>'profilesubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
)); ?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>
<script>
$(document).ready(function(){
        $(document).on('click','#cancelprofilepop',function(){
            $('.client-area').find('a')[1].click();
        });
        $(document).on('click','#profilesubmit',function(){
       
      // $('#users-form').submit();
       var thedata = $("#medical-form,#users-form").serialize();
      $.ajax({
        type: 'POST',
        url: '<?php echo CController::createUrl("users/saveprofile")?>',
        cache: false,
        data: thedata,
        beforeSend: function () {
            $('.loader').css('display','block');
            $('#sessionholder').append('<div class="loading"><img src="loading.gif" alt="loading..." /></div>');
        },
        success: function (data) {
       
        $('.loader').css('display','none');
        var obj = jQuery.parseJSON(data);
            if(jQuery.isEmptyObject(obj)){ 
               console.log($('#medical-form').parents().find('#tab2'));
                $('#medical-form').parents().find('#tab2').addClass('active in');
                $('#medical-form').parents().find('#tab1').removeClass('active in');
                 $('#medical-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
                   
                    }else if(obj =='file' ){
                $('#medical-form').parents().find('#tab2').addClass('active in');
                $('#medical-form').parents().find('#tab1').removeClass('active in');
                 $('#medical-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
                }else{
                  $('#medical-form').parents().find('h3').next().html('<div class="alert alert-error in alert-block fade">Fill the form correctly.</div>');
                //alert(obj.UserDetails_qid);
                }
                if(obj.UserDetails_qid == 'success'){
                    $('#medical-form').parents().find('h3').next().html('<div></div>');
                   window.location = '<?php echo CController::createUrl("users/userdashboard") ;?>';
                }
                 
            //$(".loading").detach();
            //$(".error").detach();
            //$('#sessionholder').append(data);
           //$("#medical-form").submit();
        },
                afterSuccess:function(){
          
                },
        error: function () {
        $('.loader').css('display','none');
            $('#sessionholder').append('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
            }
        });
   
    return false;

   }) 
});
</script>
<!--</div> form -->

