
<?php if($users){
     foreach($users as $user){
     $model = Users::model()->findByPk($user->user_id);
    $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'Client-details_'.$user->user_id,
    'header' => '<h3>User Details</h3>',
    'content'=> $this->renderPartial('client_form_tab',array('model'=>$model,'details'=>$user),true),
     'show'=>false,
//   'onHidden'=>'function(){ 
//                       $(".client-area").find("a")[1].click();
//                        }',
    'keyboard'=>true,
    'htmlOptions'=>array('class'=>'user-modal',
//                       'style'=>'z-index:9999'
                                             ),
    'footer' => array( TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),   
    ),
 ));   ?>

<!--------Exercise History Popup--------------><?php
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'exe-history_'.$user->user_id,
    'header' => '<h3>Exercise History</h3>',
    'content'=> $this->renderPartial('_history',array('model'=>$model,'details'=>$user),true),
    'show'=>false,
//    'onHidden'=>'function(){ 
//                   $(".client-area").find("a")[1].click();
//                        }',
    'keyboard'=>false,
        'htmlOptions'=>array('class'=>'modal hide fade history-modal',
                 //         'style'=>'z-index:9999'
                                             ),
    'footer' => array(TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),
     ),
 ));   ?>

<?php }}?>
<!--------**********-------------->
<!--------Work out Popup-------------->
<div id="workout" class="modal hide fade workout-modal">

    <div class="ajaxload" style="display:none"><div style="" id="blockui"><div id="loaderimg" class=""><img align="middle" src="<?php echo Yii::app()->request->baseUrl ?>/images/loader.gif" valign="middle" style="left: 40%;position: relative;"></div></div></div>
    <!--<div class="ajaxload" style="display:none"><img src="<?php //echo Yii::app()->request->baseUrl ?>/images/loader.gif"></div>-->
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Add Workout</h3>
  </div>
   
  <div class="modal-body">  
    <div class="column3"> 
    	<h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>What exercise of activity did you preform?</h5>
        
            
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'workout-form',
        'action'=>array('UserWorkouts/Addlegalworkout'),
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-inline'),
));
$hr = array();$ss= array();$mm=array();
for($i=0;$i <= 24;$i++) {
  $hr[$i]=$i ; }
for($i=0;$i <= 60;$i++) {
  $mm[$i]=$i ; $ss[$i]=$i ;
  }

$active = array(1=>'Active',0=>'Inactive');

?><input type="hidden" id="hiddenworkid" name="worktypeid" value="">
  <input type="hidden" id="exerciseid" name="exerciseid" value="">
  <input type="hidden" id="exercisetype" name="exercisetype" value="">
  <input type="hidden" id="hiddenuserid" name="userid" value="">
        <ul>
            <li>
                    <?php  
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'servv',
                    'sourceUrl' => array('site/working'),
                    'options' => array(
                                'minLength' => '2',
                                'select' => 'js: function(e,u){
                                    var Item_id = u.item["id"];
                                    var type_id = u.item["typeid"];
                                    var exercisetype = u.item["exercise_id"];
                                    if(exercisetype == 1){
                                    $("li.duration *").attr("disabled", true)
                                    }else{ $("li.duration *").attr("disabled", false)
                                    }
                                  $("#hiddenworkid").val(type_id);
                                  $("#exerciseid").val(Item_id);
                                  $("#exercisetype").val(exercisetype);
                                   if(exercisetype==1){
                                                $("li.distance").css("display","none");
                                                $("li.weight").css("display","block");
                                                $("#exercisetype").val("1");
                                            }
                                            else{
                                                $("li.distance").css("display","block");
                                                 $("li.weight").css("display","none");
                                                 $("#exercisetype").val("");
                                            }
                                       }',
                                'open' => 'js:function(event, ui){

                                    $("ul.ui-autocomplete li a").each(function(){
                                   // var htmlString = $(this).html().replace(/,/g, "<br>");
                                   // htmlString = htmlString.replace(/,/g, "<br>");
                                   // $(this).html(htmlString);

                                    });}',
                                'success' => 'js:function(event,resp){
                                    
                                    }',
            ),
            'htmlOptions' => array(
                'class' => 'exer-type',
                'id' => 'search-services',
                'value' => 'e. g. full arms',
                'onblur'=>"if(this.value==''){this.value='e.g.Bicycle'}", 
                'onclick'=>"if(this.value=='e.g.Bicycle'){this.value=''}"
            ),
        ));?>
            	                
                <button type="submit" class="btn" disabled="true" id="addentry">Add Entry</button>
            </li>
            <li>
                    <label>Date </label>
                    <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                                                                    'model'=>$details,
//                                                                    'attribute' => 'dob',
                                                                        'value'=>  date('m/d/Y'),
                                                                        'name'=>'date',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                        'startDate'=> '-0d',
                                                                        'endDate'=> '+0d',
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                  </li>
            <li class="duration">
               <label>Duration</label>
               <?php echo TbHtml::dropdownList('datetime_hour', false, $hr,array('empty'=>'Hour')); ?>
                <?php echo TbHtml::dropdownList('datetime_min', false, $mm,array('empty'=>'Min')); ?>
               <?php //echo TbHtml::dropdownList('datetime_sec', false, $ss); ?>
            </li>
            <li class="distance">
            	<label>Distance </label>
                <input type="text" placeholder="00" name="distance">
                <span>Speed </span>
                <input type="text" placeholder="00" name="speed">
                
                <span>Incline </span>
                <input type="text" placeholder="00" name="incline">
                <span>Level </span>
                <input type="text" placeholder="00" name="level">
            </li>
            <li class="weight">
        <div style="float: left; width: 492px;">
                <label>Set 1</label>
                <input type="text" name="set1w" placeholder="Weight">
                <input type="text" name="set1r" placeholder="Reps">
                <label>Set 2</label>
                <input type="text" name="set2w" placeholder="Weight">
                <input type="text" name="set2r" placeholder="Reps">
        </div>
        <div style="float: left; width: 492px; padding-top: 5px;">
                <label>Set 3</label>
                <input type="text" name="set3w" placeholder="Weight">
                <input type="text" name="set3r" placeholder="Reps">
                <label>Set 4</label>
                <input type="text" name="set4w" placeholder="Weight">
                <input type="text" name="set4r" placeholder="Reps">
        </div>
                <div style="float: left; width: 492px; padding-top: 5px;">
                <label>Set 5</label>
                <input type="text" name="set5w" placeholder="Weight">
                <input type="text" name="set5r" placeholder="Reps">
                <label>Set 6</label>
                <input type="text" name="set6w" placeholder="Weight">
                <input type="text" name="set6r" placeholder="Reps">
        </div>
                 <div style="float: left; width: 492px; padding-top: 5px;">
                <label>Calories</label>
                <input type="text" name="customcalories" placeholder="Calories" style="width:152px;">
                </div>
            </li>
        </ul>
        <?php $this->endWidget();?>
        
    </div>    
    <div class="column4">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#add1" data-toggle="tab">Exercise Journal</a></li>
                <li><a href="#add2" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="add1">
                    
                    <?php   echo TbHtml::dropDownListControlGroup('work_id','work_id[]',Worktype::model()->getworkDropDown(), array('prompt'=>'Please Choose',
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/workouts'), //url to call.
                                                                            
                                                                            'update'=>'#workouts',
                                                                            'beforeSend'=>'js:function(){
                                                                                $("#workouts").html($(".ajaxload").html());
                                                                                }',
                                                                            'success'=>'js:function(data){
                                                                                $("#workouts").html(data);
                                                                                }', //selector to update
                                                                             'data'=>'js:{workid:$(this).val()}',
                                                                            //leave out the data key to pass all form values through
                                                                            )
                        )); ?>
                    <ul id="workouts" class="workout-list"></ul>
                </div>
                
            	<div class="tab-pane" id="add2">
                    <ul id="recworkouts" class="workout-list">
                      <?php
                        $cid = $_COOKIE[current(preg_grep('/guid$/', array_keys($_COOKIE)))];
                      if($cid){
                      $allworkouts = UserWorkouts::model()->findAll(array('condition'=>'user_id='.$cid.' AND adddate BETWEEN date(NOW()) AND DATE_ADD(date(NOW()), INTERVAL 7 DAY) group by name')); 
                      
                      if($allworkouts){
                      foreach($allworkouts as $modelq){ ?>
                	<li><a href="#" worktype="<?php echo $modelq->worktype->type; ?>" exercise="<?php echo $modelq->workout_id; ?>" typeid="<?php echo $modelq->worktype_id; ?>" class="workitem" id="workitem_<?php echo $modelq->workout_id; ?>"><?php echo $modelq->name; ?></a></li>
                      <?php }
                      
                      }
                      
                      }else{echo 'No Recent';}?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="worksub" data-toggle="modal" role="button" href="#">Submit</a> </div>
</div>
<!--------*********-------------->
<!--------Event Popup-------------->
<div id="event" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Add Event</h3>
  </div>
  <div class="modal-body">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'events-add',
                                'action'=>array('TrainerDetails/Addevent'),
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));?>
        <ul> 
        	<li><label>Event</label>
            <input name ="event_title" id="evtitle" type="text" placeholder="" required="required"></li>         
          <li>
            <div class="input-append date" id="dp3" data-date="" data-date-format="dd-mm-yyyy">
              <label>From</label>
              <?php echo TbHtml::textField('evdate', '', array('class'=>'span2','readonly' => true,'id'=>'fromdate')) ?>
              <!--<input class="span2" name ="evdate" id="fromdate" size="16" type="date" value="08-11-2013" >-->
              <span class="add-on"><i class="icon-th"></i></span> </div>
              
          </li>          
          <li class="distance">
            <label>Time</label>            
            <span>Form</span>
            <input type="text" placeholder="10">
            <span>To</span>
            <input type="text" placeholder="00">
          </li>
          <li>
          	<label class="vt">Description</label>
            <textarea placeholder="" name="event_description"></textarea>
          </li>
        </ul>
    <?php $this->endWidget(); ?>
    
                      
                   
  </div>
  <div class="modal-footer">
    <button data-dismiss="modal" class="btn">Cancel</button>
    <a href="#" role="button" data-toggle="modal" class="btn btn-primary" id="event-sub">Submit</a> </div>
</div>
<!--------********-------------->
<!--------Mail Box Popup-------------->
<?php if ($usermessages) {
    foreach ($usermessages as $key => $message) {
        $clientsdetails1 = UserDetails::model()->findByAttributes(array('user_id'=>$message->from_sender));
                
        ?>

<div id="mail-box_<?php echo $clientsdetails1->user_id?>" class="modal hide fade workout-modal message_modal">
   <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3>Send a reply</h3>
</div>
    <?php $mes = new TrainerClientMsg;
   $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'to-user-message-form_'.$clientsdetails1->user_id,
                                'action'=>array('UserWorkouts/SendReply'),
                                'enableAjaxValidation'=>true,
                               'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
                                'htmlOptions'=>array('class'=>'form-horizontal'),
                                ));
                              ?>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12 message-box">
              
            <input type="hidden" value="<?php echo $message->from_sender; ?>" id="note_user_id" name="user_id"> 
            <div  id="messagedata_<?php echo $key; ?>" style="display: none;"></div>
            <div class="control-group">
              <label class="control-label" for="inputTxt">To</label>
              <div class="controls">
                  <input type="text" value ="<?php echo $clientsdetails1->fname.' '.$clientsdetails1->lname; ?> " id="inputText" placeholder="" readonly="true"  name="reply_to">
            </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputTxt">Subject</label>
              <div class="controls">
                <input type="text"  name="subject" id="inputText" >
                <?php echo $form->error($mes,'subject'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="Massage">Message</label>
              <div class="controls">
                <textarea rows="10"  name="message" ></textarea>
                <?php echo $form->error($mes,'message'); ?>
              </div>
            </div>            
          
        
      </div>
    </div>
  </div>
  <div class="modal-footer">
      
    <button data-dismiss="modal" class="btn">Cancel</button>
    <?php echo TbHtml::ajaxSubmitButton('Send',array('UserWorkouts/SendReply'),array( 'success' => 'js:function(response){
                                      data = JSON.parse(response);
                                     if(data.status == "success"){
                         $("#to-user-message-form_'.$clientsdetails1->user_id.' .modal-footer").html("Message Sent successfully.");
                         $("#to-user-message-form_'.$clientsdetails1->user_id.'")[0].reset();
                             $("#mail-box_'.$clientsdetails1->user_id.'").modal("hide");
                        }
                         else{
                        $.each(data, function(key, val) {
                        $("#to-user-message-form_'.$clientsdetails1->user_id.' #"+key+"_em_").text(val);                                                    
                        $("#to-user-message-form_'.$clientsdetails1->user_id.' #"+key+"_em_").show();
                        });
                        }       


                        }',),array('class'=>'btn btn-primary'));?>
    
</div>
<?php $this->endWidget(); ?>
</div>
<?php }}?>
<!--------**********-------------->
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
                        <td style="width:25px;">
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
<script>
$('#planner').css('display','none');
$(document).ready(function(){
    var uid = 0;
    if($.session.get("guid")){
        var user_id = $.session.get("guid");
            $('#clientslist').css('display','none');
            $('#planner').css('display','block');
             $('#hiddenuserid').val(user_id);
             $('#worknote_user_id').val(user_id)
             $('#accordion1').html(getworkouts(user_id));
             
            
             $('#accordion2').each(function(){
             $('.hiddenusersid').val(user_id)
                     })
    }else{ $('#planner').css('display','none');}
     /**Load the messages on page ready**/
     $('#accordion3').html(getmessages());
     /************/
    /***Make the client plan show hidden when the page loads**/
     
    
     /*****/
   $('#collapse_0').addClass('collapse in');
   $('#collapse_0i').addClass('collapse in');
   $('#collapse_0').parent().find('.accordion-toggle i').removeClass('icon-plus').addClass('icon-minus');
   $('#collapse_0i').parent().find('.accordion-toggle i').removeClass('icon-plus').addClass('icon-minus');
   $('.accordion').on('show hide', function (n) {
    $(n.target).siblings('.accordion-heading').find('.accordion-toggle i').toggleClass('icon-plus icon-minus');
});
   /****Client tab click make the client list visible and hide the planner*****/
   $(document).on('click','ul.categories a.clients',function(){
        $('#planner').css('display','none');
       $('#clientslist').css('display','block');
   })
   /****/
    /****Message tab click make message render partial load the remote file*****/
   $(document).on('click','ul.categories a.massage',function(){
       $('#accordion3').html(getmessages());
   })
   /****/
     /****Client list click make the planner visible and hide the client list*****/
    $('.plans').click(function(){
        var user_id = $(this).attr('id');
        $.session.set("guid",user_id);
        $('#hiddenuserid').val(user_id);
        $('#worknote_user_id').val(user_id)
        $('#accordion1').html(getworkouts(user_id));
        $('#planner').css('display','block');
        $('#clientslist').css('display','none');
        $('#accordion2').each(function(){
            $('.hiddenusersid').val(user_id)
        })
    });
    
    function newplaner(user_id){
        $('#hiddenuserid').val(user_id);
        $('#worknote_user_id').val(user_id)
        $('#accordion1').html(getworkouts(user_id));
        $('#planner').css('display','block');
        $('#clientslist').css('display','none');
        $('#accordion2').each(function(){
            $('.hiddenusersid').val(user_id)
        })
    }
    /**Function to return the particular client plans and data****/
    function getworkouts(id){
        var retresp; 
        $.ajax({
            url:'<?php echo CController::createUrl("UserWorkouts/Usersworkouts"); ?>',
            data:{id:id},
            async: false, 
            type:'POST',
            success:function(response){
                retresp = response;
             }
        });
        return retresp;
    }
    /********/
    /**Function to return the particular client plans and data****/
    function getmessages(){
        var retresp; 
        $.ajax({
            url:'<?php echo CController::createUrl("UserWorkouts/Clientmessages"); ?>',
            data:{},
            async: false, 
            type:'POST',
            success:function(mesresponse){
                retresp = mesresponse;
             }
        });
        return retresp;
    }
    /********/
//    $(document).on('click','a#user-profile',function(){
//        var userid = $(this).attr('data-id');
//        $.ajax({
//            url:'<?php echo CController::createUrl("UserWorkouts/Clientprofile"); ?>',
//            data:{id:userid},
//            async: false, 
//            type:'POST',
//            success:function(response){
//               
//             }
//        });
//    })
/********/
    $('#workout').on('shown', function() {
        $("#workout-form")[0].reset();
        $("#addentry").attr("disabled", "disabled");
        $("#worksub").attr("disabled", "disabled");
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
        $('#workouts').html('');
        $('#work_id').val('');
        
    });
    $(document).on('click','#worksub',function(){
       var user_id = $.session.get("guid");
       $("#addentry").click();
            $.when(
                 $('#addentry').triggerHandler('click') 
             ).done(function() {

            
             });
    });
        var measuredate = $('.measuredates').val();
        $('#mnote').val(measuredate);
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
    /**Calender input working on calender link also*/
        $(document).on('click','.icon-calendar',function(){  
           $(this).parents('.input-append').find('#date').click();
           $(this).parents('.input-append').find('#date').focus();
           $(this).parents('.input-append').find('#mealdate').click();
           $(this).parents('.input-append').find('#mealdate').focus();
        })
    /**Dynamic enble / disable the Add entry button of workout popup to stop garbage input*/
        $("#search-services").bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#addentry").attr("disabled", "disabled");
            $("#worksub").attr("disabled", "disabled");
        } else {
            $("#addentry").removeAttr("disabled", "disabled");
            $("#worksub").removeAttr("disabled", "disabled");
        }   
    });
    /**Dynamic enble / disable the Add entry button of food popup to stop garbage input*/
    $("#search-fooditems").bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#addfoodentry").attr("disabled", "disabled");
        } else {
            $("#addfoodentry").removeAttr("disabled", "disabled");
        }   
    });
        /**Adding a workout via dynamic list generated**/
        $(document).on('click','a.workitem',function(){
           var itemname = $(this).html();
           var id =$(this).attr('typeid');
           var worktype = $(this).attr('worktype');
           var exerciseid =$(this).attr('exercise');
           $('#search-services').val(itemname);
            $("#addentry").removeAttr("disabled", "disabled");
            $("#worksub").removeAttr("disabled", "disabled");
           $('#hiddenworkid').val(id);
           $('#exerciseid').val(exerciseid);
           if(worktype==1){
               $('li.distance').css('display','none');
               $('li.weight').css('display','block');
               $('#exercisetype').val('1');
              $('li.duration *').attr('disabled', true)
           }
           else{
               $('li.distance').css('display','block');
                $('li.weight').css('display','none');
                $('li.duration *').attr('disabled', false);
                $('#exercisetype').val('');
           }
        });
      /*  $("a[data-toggle=modal]").click(function(){
    var target = $(this).attr('data-target');
    var url = $(this).attr('href');
    if(url){
        $(target).find(".modal-body").load(url);
    }
});*/
  $(document).on('click','#event-sub',function(){
     $('#events-add').submit();
 })
$('#calendar').fullCalendar({
     aspectRatio: 1.35,
     
     header:{
    left:   'title',
    center: '',
    right:  'today prev,next'
},
        editable: false,
                events: {
                url: '<?php echo CController::createUrl("TrainerDetails/getEvents"); ?>',
                type: 'POST',
                data: { },
                cache: false,
                success: function() {
                           },
                error: function() {
                    alert('there was an error while fetching events!');
                },
        color: 'yellow',   // a non-ajax option
        textColor: 'black' // a non-ajax option
            },
                eventDrop: function(event, delta) {
                              alert(event.title + ' was moved ' + delta + ' days\n' +
                              '(should probably update your database)');
                                },

                loading: function(bool) {
                            if (bool) $('#loading').show();
                            else $('#loading').hide();
                                },
                dayClick: function(date, allDay, jsEvent, view) {

                            if (allDay) {
                                 var dd = date.getDate();
                                 var mm= date.getMonth()+1;
                                 var yy = date.getFullYear();
                                
                                $('#event').find('#fromdate').val(dd+'-'+mm+'-'+yy);
                                $('#event').modal('show'); 
                               
//                            alert('Clicked on the entire day: ' + date);
                            }else{
//                                alert('Clicked on the slot: ' + date);
                                 alert('You must be click on entire day.');
                            }

//                            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

//                            alert('Current view: ' + view.name);

                            // change the day's background color just for fun
//                            $(this).css('background-color', 'red');

                        }
       
        
        
        });
//    var calendar = $('#calendar').calendar({
//    events_source: function () { return getevents(); },
//    tmpl_path: '<?php echo Yii::app()->request->baseUrl ?>/js/tmpls/'
//    }); 

        $(document).on('click','a.recommendation',function(){
            $('#calendar').fullCalendar('render'); 
            setTimeout("$('#calendar').fullCalendar('render');",100);
        })
       setTimeout("$('#calendar').fullCalendar('render');",100);
        
});

function getevents(){
        var evresp; 
        $.ajax({
            url:'<?php echo CController::createUrl("TrainerDetails/getEvents"); ?>',
            data:{},
            async: false, 
            type:'POST',
            success:function(eventsresp){
                evresp = eventsresp;
                
             }
        });
        
        return evresp;
    }
    
</script>
    <?php  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/fcd/fullcalendar.css'); ?> 
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/fcd/fullcalendar.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/fcd/fullcalendar.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.session.js"></script>