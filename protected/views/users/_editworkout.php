<!--------Edit Workout Popup-------------->
<!--<div id="edit-workout" class="modal hide fade workout-modal"  tabindex="-1">-->
    <div class="ajaxload" style="display:none"><div style="" id="blockui"><div id="loaderimg" class=""><img align="middle" src="<?php echo Yii::app()->request->baseUrl ?>/images/loader.gif" valign="middle" style="left: 40%;position: relative;"></div></div></div>
    <!--<div class="ajaxload" style="display:none"><img src="<?php //echo Yii::app()->request->baseUrl ?>/images/loader.gif"></div>-->
<!--  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Edit Workout</h3>
  </div>-->
   
<!--  <div class="modal-body">  -->
    <div class="column3"> 
    	<h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>What exercise of activity did you preform?</h5>
        
            
<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'workout-form-edit_'.$workout->id,
        'action'=>array('TrainerDetails/editworkout','id'=>$workout->id),
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

?><input type="hidden" id="hiddenworkid1" name="worktypeid" value="">
  <input type="hidden" id="exerciseid1" name="exerciseid" value="">
  <input type="hidden" id="exercisetype1" name="exercisetype" value="">
        <ul>
        	<li>
                    <?php  
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'servv1',
//                  'model' => $order,
                    'value' =>$workout->name,
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
//                'size' => 45,
//                'maxlength' => 45,
                'disabled'=>'disabled',
                'class' => 'exer-type',
                'id' => 'search-services',
                
            ),
        ));?>
            	                
                <button type="submit" class="btn" disabled="true" id="updateentry">Update Entry</button>
            </li>
            <li>
                    <label>Date </label>
                    <div class="input-append">
                             <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                                                                    'model'=>$details,
//                                                                    'attribute' => 'dob',
                                                                        'value'=>  date('m/d/Y'),
                                                                        'events'=>array(
                                                                            'show'=>'js:function(ev){ }',
                                                                            'changeDate'=>'js:function(ev){ console.log(ev)}'
                                                                        ),
                                                                        'name'=>'date_new',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                        
                                                                    'render'=>'js:function(nowdate){
                                                                           var nowTemp = new Date();
                                                                            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
                                                                                    
                                                                             return nowdate.valueOf() <= now.valueOf() ? "disabled" : "";
                                                                                    }',
                                                                        
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true,'id'=>'date_'.$workout->id)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                  </li>
            <li class="duration">
               <label>Duration</label>
               <?php   $min = $workout->duration % 60;
                   if($workout->duration >= 60)  {
                       $hour = $workout->duration / 60;
                       $hrs = explode('.', $hour);
                      
                       echo TbHtml::dropdownList('datetime_hour', $hrs[0], $hr,array('empty'=>'Hour')); 
                       if($min!=0)
                           echo TbHtml::dropdownList('datetime_min', $min, $mm,array('empty'=>'Min'));
                       else 
                           echo TbHtml::dropdownList('datetime_min', false, $mm,array('empty'=>'Min'));
                   }else if($min!=0){
                       echo TbHtml::dropdownList('datetime_hour', false, $hr,array('empty'=>'Hour'));
                        echo TbHtml::dropdownList('datetime_min', $min, $mm,array('empty'=>'Min'));
                       
                   }else{
                       echo TbHtml::dropdownList('datetime_hour', false, $hr,array('empty'=>'Hour'));
                       echo TbHtml::dropdownList('datetime_min', false, $mm,array('empty'=>'Min'));
                   }
                   
                   ?>
                <?php  ?>
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
                <div class="tab-pane active" id="add3">
                    
                    <?php   echo TbHtml::dropDownListControlGroup('work_id1','work_id[]',Worktype::model()->getworkDropDown(), array('prompt'=>'Please Choose',
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/workouts'), //url to call.
                                                                            
                                                                            'update'=>'#workouts1',
                                                                            'beforeSend'=>'js:function(){
                                                                                $("#workouts1").html($(".ajaxload").html());
                                                                                }',
                                                                            'success'=>'js:function(data1){
                                                                                $("#workouts1").html(data1);
                                                                                }', //selector to update
                                                                             'data'=>'js:{workid:$(this).val()}',
                                                                            //leave out the data key to pass all form values through
                                                                            )
                        )); ?>
                    <ul id="workouts1" class="workout-list"></ul>
                </div>
                
            	<div class="tab-pane" id="add2">
                    <ul id="recworkouts" class="workout-list">
                      <?php  //foreach($allworks as $modelq){ ?>
                	<li><a href="#" worktype="<?php echo $modelq->worktype->type; ?>" exercise="<?php// echo $modelq->workout_id; ?>" typeid="<?php //echo $modelq->worktype_id; ?>" class="workitem" id="workitem_<?php //echo $modelq->workout_id; ?>"><?php //echo $modelq->name; ?></a></li>
                      <?php //}?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
  <!--</div>-->
<!--    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="worksub" data-toggle="modal" role="button" href="#">Submit</a> </div>-->
<!--</div>-->
<!--------End of Edit Workout Popup------------->