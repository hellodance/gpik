<div class="loader" style="display: none;position: absolute;top: 50%;left: 50%;z-index: 999999;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/ajaxloader.gif" ></div>
<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'trainer-reg',
'header' => '<h3>Trainers Details</h3>',
//    'closeText'=>true,
    'keyboard'=>true,
    'content'=> $this->renderPartial('trainer_form_1',array('model'=>$model,'details'=>$details),true),
    'show'=>true,
    'onHidden'=>'function(){ 
                       window.location = "'.CController::createUrl("users/traindashboard",array("id"=>Yii::app()->user->id)).'";
                        }',
    'htmlOptions'=>array('class'=>'user-modal'),
    'footer' => array(

TbHtml::button('Cancel', array('data-dismiss' => 'modal')),
TbHtml::submitButton('Submit', array('id'=>'trainersubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
)); ?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>
<script>
$(document).ready(function(){
$(document).on('click', 'a[href="#tab4"]', function(){ 
  $('#trainer-details-form').find('#activa').val('1');
    
});    
$(document).on('click', 'a[href="#tab3"]', function(){ 
  $('#trainer-details-form').find('#activa').val('0');
    
});
   $(document).on('click','#trainersubmit',function(){
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
        $('.loader').css('display','none');
        var obj = jQuery.parseJSON(data);
            if(jQuery.isEmptyObject(obj)){ 
               console.log($('#trainer-details-form').parents().find('#tab4'));
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
                }
                if(obj.TrainerDetails_qid == 'success'){
                 $('#trainer-details-form').parents().find('h3').next().html('<div></div>');  
                window.location = '<?php echo CController::createUrl("users/traindashboard",array('id'=>Yii::app()->user->id)) ;?>';
                }
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
<div class="container inner">
<div class="row-fluid">
      <div class="span12">
        <h2 class="top-box">Dashboard</h2>
        <div class="box-profil trainer-dask">
          <ul class="categories">
            <li class="active"> <a href="#clients" onclick="void(0);"class="clients">Clients</a><span class="radius-bottom"></span></li>
            <li class=""> <a href="#massage" class="massage">Messages</a><span class="radius-bottom"></span></li>
            <li class=""> <a href="#reports" class="progress1">Reports</a><span class="radius-bottom"></span></li>
            <li class="" id="backbone"> <a href="#calendars" class="recommendation">Calendar</a><span class="radius-bottom"></span></li>
            <li class=""> <a href="#customPlans" class="measurement">Custom Plans</a> <span class="radius-bottom"></span></li>
          </ul>
          <div class="tab-content">
              <!--------Clients Tab content-------------->
            <div class="tab-pane active" id="clients">
              <div class="row-fluid client-data" id="clientslist">
                <div class="span12">
                    <?php // echo '<pre>'; print_r($users); echo '</pre>';?>
                    <?php if($users){
                        $allwork = array();
                    foreach($users as $user){
                        
                        $allwork = array_replace($allwork,UserWorkouts::model()->findAll(array('condition'=>'user_id='.$user->user_id.' AND adddate BETWEEN date(NOW()) AND DATE_ADD(date(NOW()), INTERVAL 7 DAY) group by adddate')) );
                        $model = Users::model()->findByPk($user->user_id);
                        ?>
                   
                  <div class="client-list">
                    <div class="client-left"> <a id="user-profile2" data-id="<?php echo $user->user_id; ?>" href="#Client-details_<?php echo $user->user_id; ?>" role="button" data-toggle="modal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php if($user->avtar){ echo 'avtar'.'/'.$user->avtar; }else{ ?>images/no_image.jpg <?php }  ?>" alt="" width="97px" /></a>
                      <div class="view"><a id="user-profile" data-id="<?php echo $user->user_id; ?>" href="#Client-details_<?php echo $user->user_id; ?>" role="button" data-toggle="modal">View Full Profile</a></div>
                    </div>
                    <div class="client-right" >
                      <ul>
                          <div class="plans" id="<?php echo $user->user_id ; ?>">
                        <li><strong>Name</strong>
                          <p><a href="#"><?php echo $user->fname.' '.$user->lname ; ?></a></p>
                        </li>
                        <li><strong>Gender</strong>
                          <p><?php echo $user->gender == 1 ? 'Male':'Female' ; ?></p>
                        </li>
                        <li><strong>Current Weight</strong>
                          <p><?php echo $user->curweight ; ?></p>
                        </li>
                        <li><strong>Goal Weight</strong>
                           <p><?php echo $user->goalweight ; ?></p>
                        </li>
                        <li><strong>Height</strong>
                          <p><?php echo $user->height ; ?></p>
                        </li>
                          </div>
                        <li><a href="#exe-history_<?php echo $user->user_id ?>" data-target='#exe-history_<?php echo $user->user_id ?>' data-id="<?php echo $user->user_id; ?>" role="button" data-toggle="modal">View Exercise History</a></li>
                         
                      </ul>
                    </div>
                  </div>
                    <?php }} else {echo 'No client is available in your network.'; }?>
                </div>
              </div>
              <div class="tab-pane" id="planner" >
              <div class="workoutBtn"><a href="#workout" role="button" data-toggle="modal">Add Workout</a></div>
              <div class="tab-mex">
                <div class="row-fluid client-data">
                  <div class="span12">
                      <div class="accordion" id="accordion1"></div> <!--Load the Userworkouts worktraingrid view via Ajax call-->
                  </div>
                </div>
                <div class="row-fluid diet-plan">
                  <div class="span12">
                    <h3>Diet Plans</h3>
                    


                    <div class="accordion" id="accordion2">
                      <?php 
                      $days = new DatePeriod(new DateTime, new DateInterval('P1D'), 6); 
                     foreach ($days as $key=>$day ){ ?>
                        <div class="accordion-group">
                        <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php echo $key ; ?>i">
                        <i class="icon-plus"></i><?php  echo $day->format('F Y - j l'); ?></a> </div>
                        <div id="collapse_<?php echo $key ; ?>i" class="accordion-body collapse">
                          <div class="accordion-inner"> 
                              <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'diet-note-form_'.$key,
                                'action'=>array('UserWorkouts/Adddietnotes'),
                                'enableAjaxValidation'=>false,
//                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));
                              ?>
                            <input type="hidden" value="" id="note_user_id" class ="hiddenusersid"name="user_id">  
                          <input type="hidden" value="<?php  echo $day->format('Y-m-d h:i:s'); ?>" id="mnote_<?php echo $key; ?>" name="mdate">
                          <div  id="respectivedata_<?php echo $key; ?>" style="display: none;"></div>
                          <table class="table table-bordered" >
                              <tbody>
                                  <tr>
                              <td class="item"><textarea  name="dietnotes" ></textarea></td>
                        </tr>
                        <tr><td>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserWorkouts/Adddietnotes'),array( 'success' => 'js:function(resp){
                                $("#respectivedata_'.$key.'").css("display","block");
                                    $("#respectivedata_'.$key.'").html(resp);
                                    }',),array('class'=>'btn btn-primary'));?>
                            </td></tr>
                        </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                        <?php $this->endWidget(); ?>
                      <?php }  ?>
                    </div>
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="span12">
                      <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'user-workout-form',
                                'action'=>array('UserWorkouts/Addworkoutnotes'),
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));?>
                      <fieldset>
                          <input type="hidden" value="" id="mnote" name="mdate">
                        <legend style="border: none;">Trainer  Notes</legend>
                        <div  id="respectivedataw_1" style="display: none;margin: -25px 0 11px 2px;"></div>
                        <input type="hidden" value="" id="worknote_user_id" name="user_id">  
                        <input type="hidden" value="<?php  echo date('Y-m-d h:i:s'); ?>" id="mnote_1" name="mdate">
                        <textarea  name="worknotes"></textarea>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserWorkouts/Addworkoutnotes'),array( 'success' => 'js:function(resp){
                                    $("#respectivedataw_1").css("display","block");
                                    $("#respectivedataw_1").html(resp);
                                    }',),array('class'=>'btn btn-primary'));?>
                        </fieldset>
                    <?php $this->endWidget(); ?>
<!--                    <form>
                      <fieldset>
                        <legend>Trainer  Notes</legend>
                        <textarea placeholder="Type something…"></textarea>
                        <input name="Submit2" type="submit" class="btn btn-primary" value="Submit" id="Submit2" />
                      </fieldset>
                    </form>-->
                  </div>
                </div>
              </div>
            </div>
            </div>
              <!--------Message Tab content-------------->
            <div class="tab-pane" id="massage">
              <div class="tab-mex">
                <div class="row-fluid client-data">
                  <div class="span12">
                    <div class="accordion" id="accordion3"></div><!--Load the User Messages view via Ajax call-->
                  </div>
                </div>
              </div>
            </div>
              <!--------Reports Tab content-------------->
            <div class="tab-pane" id="reports">
                <h3>Coming Soon!</h3>
            </div>
              <!--------Calender Tab content-------------->
              
            <div class="tab-pane" id="calendars">
               
              <div class="row-fluid">
                	<div class="span8">
                            <!--<h1><?php echo date('F Y') ?></h1>-->
                            <!--<div id='loading' style='display:none'>loading...</div>-->
                             <div id="calendar"></div>
               	    	<!--<a data-toggle="modal" role="button" href="#event"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/calendar01.gif" alt="" style="width:100%" /></a>-->
                    </div>
                    <div class="span4">                    	
                    	<h1>Gympik Events</h1>
                        <?php if ($events){ 
     foreach ($events as $event){
                            ?>
                        <div class="event">
                        	<h5><?php echo $event->title;?><span><?php echo date('M m, Y',$event->start_from);?></span></h5>  
                            <div class="event-data">
                            	<strong>Fitness Center , 123 Main Street , Bangalore, India</strong>
                                <p><?php echo $event->description; ?></p>
                            </div>
                        </div>
     <?php } }else{ ?><h5>No Events registered.</h5>   <?php }?>
                    </div>
              </div>
            </div>
              <!--------Custom Tab content-------------->
            <div class="tab-pane" id="customPlans">
            	<div class="row-fluid">
                	<div class="span12">
                    	<h3>Coming Soon!</h3>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

