<!--<div class="form">-->
<div class="loader" style="display: none;position: absolute;top: 50%;left: 50%;z-index: 999999;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/ajaxloader.gif" ></div>
<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'trainer-reg',
'header' => '<h3>Trainers Details</h3>',
    'closeText'=>false,
    //'backdrop'=>false,
    'keyboard'=>false,
'content'=> $this->renderPartial('trainer_form',array('model'=>$model,'details'=>$details),true),//'adasdasdasd',//
//'remote' => $this->renderPartial('_form',array('model'=>$model),true),
//'options' =>array('remote' => 'site/userlogin'),
'show'=>true,
'onHidden'=>'function(){ 
                       $(".client-area").find("a")[1].click();
                        }',
 'htmlOptions'=>array('class'=>'user-modal'),
'footer' => array(

TbHtml::button('Cancel', array('data-dismiss' => 'modal')),
TbHtml::submitButton('Submit', array('id'=>'trainersubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
)); ?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>
<script>
    function check(){
                   return window.location = '<?php echo CController::createUrl("users/traindashboard",array('id'=>Yii::app()->user->id)) ;?>';
                } 
$(document).ready(function(){
$(document).on('click', 'a[href="#tab4"]', function(){ 
  $('#trainer-details-form').find('#activa').val('1');
    
});    
$(document).on('click', 'a[href="#tab3"]', function(){ 
  $('#trainer-details-form').find('#activa').val('0');
    
});
   $(document).on('click','#trainersubmit',function(){
      // $('#trainer-profile-form').validate();
      // $('#users-form').submit();
       var thedata = $("#trainer-profile-form,#trainer-details-form").serialize();
      $.ajax({
        type: 'POST',
        url: '<?php echo CController::createUrl("users/savetrainerprofile")?>',
        cache: false,
        data: thedata,
        beforeSend: function () {
            $('.loader').css('display','block');
            $('#sessionholder').append('<div class="loading"><img src="loading.gif" alt="loading..." /></div>');
            
        },
        success: function (data) {
       // alert(data);
        $('.loader').css('display','none');
        var obj = jQuery.parseJSON(data);
            if(jQuery.isEmptyObject(obj)){ 
              var cc = checksforms();
              if(cc.length===0){check()}else{}
                $('#trainer-details-form').parents().find('#tab4').addClass('active in');
                $('#trainer-details-form').parents().find('#tab3').removeClass('active in');
                 $('#trainer-details-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
                   $('#trainer-details-form').find('#activa').val('1');
                   }else if(obj =='file' ){
                $('#trainer-details-form').parents().find('#tab4').addClass('active in');
                $('#trainer-details-form').parents().find('#tab3').removeClass('active in');
                 $('#trainer-details-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
                  $('#trainer-details-form').find('#activa').val('1');
                }else{
                  $('#trainer-details-form').parents().find('h3').next().html('<div class="alert alert-error in alert-block fade">Complete the form.</div>')
                //alert(obj.UserDetails_qid);
                }
                function checksforms(){
                 var flash = []; 
                        $(":text, :checkbox, select, textarea").each(function(e) {
                                if($(this).val() === ""){
                                        flash.push(this);
                                    }
                             });
                     return flash;
                }
                if(obj.TrainerDetails_qid == 'success'){
                 $('#trainer-details-form').parents().find('h3').next().html('<div></div>');  
                window.location = '<?php echo CController::createUrl("users/traindashboard",array('id'=>Yii::app()->user->id)) ;?>';
                }
                
                 
            //$(".loading").detach();
            //$(".error").detach();
            //$('#sessionholder').append(data);
           //$("#medical-form").submit();
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
    
        <?php //$this->endWidget(); ?>

<!--</div> form -->

