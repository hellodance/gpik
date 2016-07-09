<style>
    tr.odd{
    background-color: #F0F0F0;
    }
    .ui-autocomplete{
     left: 301px;
    position: fixed;
    
    width: 621px;
    z-index: 1051;
    }
    #chartcontainer, #foodcaloriecontainer{
        height: 200px;
    }
    #blockui {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.6);
    border-radius: 8px;
/*    left: 100px;*/
    padding: 17%;
    position: relative;
    /*top: 100px;*/
    z-index: 11000;
}
    .icon-remove-signs {
    background-position: -48px -96px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 14px;
    line-height: 14px;
    margin-top: 1px;
    vertical-align: text-top;
    width: 14px;
    
}
</style> 
<!--------Add Workout Popup-------------->
<div id="add-workout" class="modal hide fade workout-modal">
    <div class="ajaxload" style="display:none"><div style="" id="blockui"><div id="loaderimg" class=""><img align="middle" src="<?php echo Yii::app()->request->baseUrl ?>/images/loader.gif" valign="middle" style="left: 40%;position: relative;"></div></div></div>
    <!--<div class="ajaxload" style="display:none"><img src="<?php //echo Yii::app()->request->baseUrl ?>/images/loader.gif"></div>-->
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Add Workout</h3>
  </div>
   
  <div class="modal-body">  
    <div class="column3"> 
    	<h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>What exercise of activity did you preform?</h5>
        
            
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'workout-form',
        'action'=>array('TrainerDetails/addworkout'),
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
        <ul>
        	<li>
                    <?php  
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'servv',
//                  'model' => $order,
                    'sourceUrl' => array('site/working'),
                    'options' => array(
                                'minLength' => '2',
                                'select' => 'js: function(e,u){
                                    var Item_id = u.item["id"];
                                    var type_id = u.item["typeid"];
                                    var exercisetype = u.item["exercise_id"];
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
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                  </li>
            <li>
               <label>Duration</label>
               <?php echo TbHtml::dropdownList('datetime_hour', false, $hr); ?>
                <?php echo TbHtml::dropdownList('datetime_min', false, $mm); ?>
               <?php //echo TbHtml::dropdownList('datetime_sec', false, $ss); ?>
            </li>
            <li class="distance">
            	<label>Distance</label>
                <input type="text" placeholder="00" name="distance">
                <span>Speed</span>
                <input type="text" placeholder="00" name="speed">
                
                <span>Incline</span>
                <input type="text" placeholder="00" name="incline">
                <span>Level</span>
                <input type="text" placeholder="00" name="level">
            </li>
            <li class="weight">
        <div style="float: left; width: 492px;">
                <span>Set 1</span>
                <input type="text" name="set1w" placeholder="Weight">
                <input type="text" name="set1r" placeholder="Reps">
                <span>Set 2</span>
                <input type="text" name="set2w" placeholder="Weight">
                <input type="text" name="set2r" placeholder="Reps">
        </div>
        <div style="float: left; width: 492px; padding-top: 5px;">
                <span>Set 3</span>
                <input type="text" name="set3w" placeholder="Weight">
                <input type="text" name="set3r" placeholder="Reps">
                <span>Set 4</span>
                <input type="text" name="set4w" placeholder="Weight">
                <input type="text" name="set4r" placeholder="Reps">
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
                      <?php  foreach($allworks as $modelq){ ?>
                	<li><a href="#" worktype="<?php echo $modelq->worktype->type; ?>" exercise="<?php echo $modelq->workout_id; ?>" typeid="<?php echo $modelq->worktype_id; ?>" class="workitem" id="workitem_<?php echo $modelq->workout_id; ?>"><?php echo $modelq->name; ?></a></li>
                      <?php }?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<!--------End of Add Workout Popup------------->

<!--------Enter Daily Meals Popup-------------->
<div id="add-food" class="modal hide fade workout-modal calories">
  <div class="modal-header">
  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Add Meals</h3>
  </div>
  <div class="modal-body">  
    <div class="column3"> 
        <h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>What did you eat today?</h5>
       <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'food-intake-form',
        'action'=>array('TrainerDetails/addfood'),
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-inline'),
)); $size =  array();
       for($i=1;$i <= 10;$i++) {
  $size[$i]=$i ; 
  }
  $mealtype = array(1=>'Breakfast',2=>'Lunch',3=>'Dinner',4=>'Snacks');
       ?>
        <input type="hidden" id="hiddenfoodtypeid" name="foodtypeid" value="">
        <input type="hidden" id="foodid" name="foodid" value="">
        
        <ul>
        	<li>
                    <?php  
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'foods',
//                  'model' => $order,
                    'sourceUrl' => array('site/Foddies'),
                    'options' => array(
                                'minLength' => '2',
                                'select' => 'js: function(e,u){
                                    var Item_id = u.item["id"];
                                    var type_id = u.item["typeid"];
                                  $("#hiddenfoodtypeid").val(type_id);
                                  $("#foodid").val(Item_id);
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
                'class' => 'food-type',
                'id' => 'search-fooditems',
                'value' => 'e. g. full arms',
                'onblur'=>"if(this.value==''){this.value='e.g.Bycycle'}", 
                'onclick'=>"if(this.value=='e.g.Bycycle'){this.value=''}"
            ),
        ));?>
            	<!--<input type="text" class="exer-type" placeholder="">-->                    
                <button type="submit" class="btn" disabled="true" id="addfoodentry">Add Entry</button>
            </li>
            
            <li>
            	<label>Serving Size</label>
                <?php echo TbHtml::dropdownList('mealsize', false, $size); ?>
                <label>Meal Type</label>
                <?php echo TbHtml::dropdownList('mealtype', false, $mealtype); ?>
            </li>
            <li>
            	
                <label>Date</label>
                <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                                                                    'model'=>$details,
//                                                                    'attribute' => 'dob',
                                                                    'name'=>'mealdate',
                                                                    'value'=>  date('m/d/Y'),
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                
            </li>
        </ul>
        <?php $this->endWidget();?>
        
    </div>    
    <div class="column4">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#add3" data-toggle="tab">Food Journal</a></li>
                <li><a href="#add4" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="add3">
                     <?php   echo TbHtml::dropDownListControlGroup('food_id','food_id[]',  Foodtype::model()->getfoodDropDown(), array('prompt'=>'Select a food group',
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/fooditems'), //url to call.
                                                                            //Style: CController::createUrl('currentController/methodToCall')
                                                                            'update'=>'#foods',
//                                                                            'success'=>'js:function(resp){}', //selector to update
                                                                             'data'=>'js:{foodid:$(this).val()}',
                                                                            //leave out the data key to pass all form values through
                                                                            ),
                                                                    'id'=>'available_food_groups',
                                                                    'class'=>'select',
                        )); ?>
                <ul id="foods" class="workout-list"></ul>
                </div>
            	<div class="tab-pane" id="add4">
                	<p>Coming Soon!</p>
                </div>
            </div>
        </div>
    </div>
  </div>
<!--  <div class="modal-footer">
    <button data-dismiss="modal" class="btn">Cancel</button>
    <a href="#first-reg1" role="button" data-toggle="modal" class="btn btn-primary">Submit</a> </div>-->
</div>
<!--------End of Enter Daily Meals------------->


<div class="container inner">
<div class="row-fluid">
      <div class="span12">
      	<h2 class="top-box">Dashboard</h2>
  <div class="box-profil about">
    <ul class="categories">
      <li class="active"><a href="#work-schedule" class="work-schedule">Workout Schedule</a> <span class="radius-bottom"></span> </li>
      <li class=""> <a href="#calories" class="calories">Calories Intake</a> <span class="radius-bottom"></span> <span class="radius-top"></span> </li>
      <li class=""> <a href="#progress" class="progress1">Progress</a> <span class="radius-bottom"></span> <span class="radius-top"></span> </li>
      <li class=""> <a href="#recommendation" class="recommendation">Recommendation</a> <span class="radius-bottom"></span> <span class="radius-top"></span> </li>
      <li class=""> <a href="#measurement" class="measurement">Measurements</a> <span class="radius-bottom"></span> <span class="radius-top"></span> </li>
    </ul>
    <div class="tab-content">
      <!-- Workout Schedule tab Content -->
      <div class="tab-pane active" id="work-schedule">
      	<div class="workoutBtn"><a href="#add-workout" role="button" data-toggle="modal">Add Workout</a></div>
        <div class="row-fluid">
           <div class="span9" style="width:72%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/customized_workout.jpg" alt="" />
             <p><strong>Perfectly Customized Workout Plans From a Real Life Trainer for Real Results</strong>&raquo;Add your workout details to help you keep on track.</p><p>&raquo; Find a certified trainer cum devoted friend.</p><p>&raquo; At-home or at the gym, 
             you always have your plan</p>           
            </div>
        <div class="span3">
                    <?php 
                        $this->widget('yiiwheels.widgets.highcharts.WhHighCharts',
                                array(
                                    
                                'pluginOptions' => array(
                                     'plotOptions'=>array('column'=>array('pointPadding'=>0.3,'borderWidth'=>0)),
                                    'credits' => array('enabled' => false),
                                    'exporting' => array('enabled' => false),
                                    
                                'title' => array(
                                            'text' => 'Calories Burned'),
                                'chart' =>array(
                                            'type' => 'column'), 
                                'xAxis' => array(
                                            'categories' => array(
                                                 'Burned')),
                                'yAxis' => array(
                                    'min'=>20,
                                    'title' => array(
                                        'text' => 'Calories Burned')),
                                    'series' => array(
                                            array('name' => 'Burned',
                                                'data' => array(UserWorkouts::model()->getCaloriegraph())),
                                        )
                                    ),
                                    'htmlOptions'=>array('id'=>'chartcontainer','style'=>'height:230px;width:260px'),
                        )
                        );
    ?>
               
            </div>
            </div>
        <!---Exercise Journal----->
        <div class="row-fluid mrg1">
        	<div class="span12">
                    
     <?php $url = $this->createUrl('Trainerdetails/toggle');
Yii::app()->clientScript->registerScript('initStatus',
        "$(document).on('change','.status',function() {
              el = $(this);
            $.ajax({
            url:'$url', 
                data:{status: el.val(), id: el.data('id')},
                 success: function(response) {
                 $.fn.yiiGridView.update('grid_cardio_workout');
                 }
                })
            });",
    CClientScript::POS_READY);
     $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'bordered',
//                        'responsiveTable' => true,
                        'dataProvider' => UserWorkouts::model()->getWorkouts(),
                        'template' => "{items}",
                        'htmlOptions'=>array('id'=>'grid_cardio_workout','class'=>'table table-bordered'),
                        'afterAjaxUpdate'=>'js:function(id,data){
                           function requestData() {
                                $.ajax ({
                                           type:"POST" ,
                                           url: "'.CController::createUrl("UserWorkouts/getData").'",
                                         success: function(response,point) {
                                         var series = chart.series[0];
                                         chart.series[0].setData(eval(response),true, false);
                                         //setTimeout(requestData, 1000);    // call it again after one second
                                           },
                                    cache: false
                                   });
                                }  
                                            var chart;
                                            chart = new Highcharts.Chart({
                                            chart: {
                                                renderTo: "chartcontainer",
                                                type: "column",
                                                events: {
                                                    load: requestData   
                                                }
                                            },
                                            credits: {
                                                    enabled: false
                                                },
                                                 exporting: {
                                                        enabled: false
                                                    },
                                            title: {
                                                text: "Calories Burned"
                                            },
                                             xAxis: {
                                                    categories: ["Burned"]
                                                    },
                                                    plotOptions: {
                                                            series: {
                                                                pointPadding: 0.3
                                                            }
                                                        },
                                            yAxis: {
                                                title: {
                                                    text: "Calories Burned"
                                                },
                                            },
                                            series: [{
                                                name: "Burned",
                                                 data:[] 
                                            }]
                                       });
                                 }',
                        'columns' => array(
                                       
                                        /*array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'name',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('site/editable'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6'
                                            )), */
                                           array('header'=>'Cardio',
                                                    'name'=>'name',
                                                    'sortable'=>false,
                                               'htmlOptions' => array('width' => '40%')
                                                ),
                                                array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'distance',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editdistance'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                                
                                            )), array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'speed',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editspeed'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                                
                                            )),array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'incline',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editincline'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'level',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editlevel'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                                
                                            )),
                                            array('header'=>'Calories',
                                                        'name'=>'calories',
                                                             'sortable'=>false,
                                                        'footer'=>'<b>Total: </b>'.UserWorkouts::model()->gettotalcalories(),
                                                        ),
                                                        array('header'=>'Duration',
                                                        'name'=>'duration',
                                                             'sortable'=>false,
                                                        'footer'=>'<b>Total: </b>'.UserWorkouts::model()->gettotalduration(),
                                                        ),
                                             array(
                                                'header' => '',
                                                'class' => 'CButtonColumn',
                                                 'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                                                        'label' => 'X',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'delete',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    //    'visible'=>'$data->status=="0"',
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_cardio_workout'),
                                                    ),
                                                ),

                                                'htmlOptions' => array('width' => '6%')
                                            ),
                                            
                                                
                                            	 array(
                                                      'header' => '',
                                                'class'=>'CButtonColumn',
                                                      'template'=>'{complete}{incomplete}',
                                                     'buttons'=>array
                                                            (
                                                         
                                                                'complete' => array
                                                                (
                                                                    'url'=>'Yii::app()->controller->createUrl("TrainerDetails/toggle",array("id"=>$data->primaryKey))',
                                                                    'label'=>'Is Complete',
                                                                    'type'=>'raw',
                                                                    'imageUrl'=> Yii::app()->request->baseUrl."/images/glyphicons-halflings.png", 
                                                                    'options' => array(                                                           
                                                                    'class' =>'icon-question-sign',
                                                                    ),
                                                                    'visible'=>'$data->iscomplete=="0"?TRUE:FALSE',
                                                                    'click'=>"function(){
                                                                                            $.fn.yiiGridView.update('grid_cardio_workout', {
                                                                                                type:'POST',
                                                                                                url:$(this).attr('href'),
                                                                                                success:function(data) {
                                                                                                        $.fn.yiiGridView.update('grid_cardio_workout');
                                                                                                }
                                                                                            })
                                                                                            return false;
                                                                                      }
                                                                             ",
                                                                    
                                                                ),
                                                                'incomplete' => array
                                                                (
                                                                    'url'=>'Yii::app()->controller->createUrl("TrainerDetails/toggle",array("id"=>$data->primaryKey))',
                                                                    'label'=>'Is Complete',
                                                                    'type'=>'raw',
                                                                    'imageUrl'=> Yii::app()->request->baseUrl."/images/glyphicons-halflings.png",
                                                                    'options' => array(                                                           
                                                                    'class' =>'icon-check',
                                                                    ),
                                                                    'visible'=>'$data->iscomplete=="1"?TRUE:FALSE',
                                                                    'click'=>"function(){
                                                                                            $.fn.yiiGridView.update('grid_cardio_workout', {
                                                                                                type:'POST',
                                                                                                url:$(this).attr('href'),
                                                                                                success:function(data) {
                                                                                                      $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                                                                                      $.fn.yiiGridView.update('grid_cardio_workout');
                                                                                                }
                                                                                            })
                                                                                            return false;
                                                                                      }
                                                                             ",
                                                                    
                                                                ),
                                                            ),
                                                     
                                                ),
                                                array(
                                                        'name'  => 'Status',
                                                        'type'  => 'raw',
                                                        'value' => '$data->statusDropdown',
                                                    ),
//                                            
                                                        
                                        ),
                           
    ));?>

            </div>
        </div>
        <div class="row-fluid mrg1">
        	<div class="span12">
     <?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'htmlOptions'=>array('id'=>'grid_weight_workout'),
                        'dataProvider' => UserWorkouts::model()->getweightWorkouts(),
                        'template' => "{items}\n{extendedSummary}",
                        'afterAjaxUpdate'=>'js:function(id,data){
                           function requestData() {
                                $.ajax ({
                                           type:"POST" ,
                                           url: "'.CController::createUrl("UserWorkouts/getData").'",
                                         success: function(response,point) {
                                         var series = chart.series[0];
                                         chart.series[0].setData(eval(response),true, false);
                                         //chart.series[0].addPoint(response); // add the point
                                         //setTimeout(requestData, 1000);    // call it again after one second
                                           },
                                    cache: false
                                   });
                                }  
                                            var chart;
                                            chart = new Highcharts.Chart({
                                            chart: {
                                                renderTo: "chartcontainer",
                                                type: "column",
                                                events: {
                                                    load: requestData   
                                                }
                                            },
                                            credits: {
                                                    enabled: false
                                                },
                                                 exporting: {
                                                        enabled: false
                                                    },
                                            title: {
                                                text: "Calories Burned"
                                            },
                                             xAxis: {
                                                    categories: ["Burned"]
                                                    },
                                                    plotOptions: {
                                                            series: {
                                                                pointPadding: 0.3
                                                            }
                                                        },
                                            yAxis: {
                                                title: {
                                                    text: "Calories Burned"
                                                },
                                            },
                                            series: [{
                                                name: "Burned",
                                                 data:[] 
                                            }]
                                       });
                                 }',
                        'columns' => array(
                                       /*
                                        array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'name',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('site/editable'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6'
                                            )), */
                                            array('header'=>'Weight Excercises',
                                                    'name'=>'name'
                                                ),
                                            'set1','set2','set3','set4',
                                            array('header'=>'Calories',
                                                        'name'=>'calories',
                                                        'footer'=>'<b>Total: </b>'.UserWorkouts::model()->getweighttotalcalories(),
                                                        ),
                                                        array('header'=>'Duration',
                                                        'name'=>'duration',
                                                        'footer'=>'<b>Total: </b>'.UserWorkouts::model()->getweighttotalduration(),
                                                        ),
                                            	array(
                                                'header' => 'Delete',
                                                'class' => 'CButtonColumn',
                                                'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_weight_workout'),
                                                    ),
                                                ),

                                                'htmlOptions' => array('width' => '8%')
                                            ),
                                   
                           array(
                                                      'header' => 'Is Complete?',
                                                'class'=>'CButtonColumn',
                                                      'template'=>'{complete}{incomplete}',
                                                     'buttons'=>array
                                                            (
                                                         
                                                                'complete' => array
                                                                (
                                                                    'url'=>'Yii::app()->controller->createUrl("TrainerDetails/toggle",array("id"=>$data->primaryKey))',
                                                                    'label'=>'Is Complete',
                                                                    'type'=>'raw',
                                                                    'imageUrl'=> Yii::app()->request->baseUrl."/images/glyphicons-halflings.png", 
                                                                    'options' => array(                                                           
                                                                    'class' =>'icon-question-sign',
                                                                    ),
                                                                    'visible'=>'$data->iscomplete=="0"?TRUE:FALSE',
                                                                    'click'=>"function(){
                                                                                            $.fn.yiiGridView.update('grid_weight_workout', {
                                                                                                type:'POST',
                                                                                                url:$(this).attr('href'),
                                                                                                success:function(data) {
                                                                                                        $.fn.yiiGridView.update('grid_weight_workout');
                                                                                                }
                                                                                            })
                                                                                            return false;
                                                                                      }
                                                                             ",
                                                                    
                                                                ),
                                                                'incomplete' => array
                                                                (
                                                                    'url'=>'Yii::app()->controller->createUrl("TrainerDetails/toggle",array("id"=>$data->primaryKey))',
                                                                    'label'=>'Is Complete',
                                                                    'type'=>'raw',
                                                                    'imageUrl'=> Yii::app()->request->baseUrl."/images/glyphicons-halflings.png",
                                                                    'options' => array(                                                           
                                                                    'class' =>'icon-check',
                                                                    ),
                                                                    'visible'=>'$data->iscomplete=="1"?TRUE:FALSE',
                                                                    'click'=>"function(){
                                                                                            $.fn.yiiGridView.update('grid_weight_workout', {
                                                                                                type:'POST',
                                                                                                url:$(this).attr('href'),
                                                                                                success:function(data) {
                                                                                                      

                                                                                                      $.fn.yiiGridView.update('grid_weight_workout');
                                                                                                }
                                                                                            })
                                                                                            return false;
                                                                                      }
                                                                             ",
                                                                    
                                                                ),
                                                            ),
                                                     
                                                ),
                                        ),
                           
    ));?>

            </div>
        </div>
        <!---Exercise Journal Ends----->
        
        <div class="row-fluid">
        	<div class="span12 mrg1">
              <textarea rows="5" disabled="disabled">---Trainer Notes---
                No Notes
                </textarea>            	
            </div>
            
        </div>
        <div class="row-fluid">
        	<div class="span12">
                    
            	    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'user-workout-form',
                                'action'=>array('UserWorkouts/Addnotes'),
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));?>
                      <fieldset>
                          <input type="hidden" value="" id="mnote" name="mdate">
                        <legend>User Notes</legend>
                        <div class="span12" id="workoutnote" style="display:none;"></div>
                        <textarea placeholder="Type something..." name="notes"></textarea>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserWorkouts/Addnotes'),array( 'success' => 'js:function(resp){
                                    $("#workoutnote").css("display","block");
                                    $("#workoutnote").html(resp)
                                    }',),array('class'=>'btn btn-primary'));?>
                        </fieldset>
                    <?php $this->endWidget(); ?>
            </div>
        </div>
      </div>
       <!-- Enf of Workout Schedule tab -->
       
       <!--Calories intake Tab Content-->
       <div class="tab-pane" id="calories">
        <div class="workoutBtn"><a href="#add-food" role="button" data-toggle="modal">Add Meals</a></div>
        <div class="row-fluid">
        	<div class="span9">
              <textarea rows="5" disabled="disabled">---Food Notes---
I am aware that this is not what we had in mind when we signed on for a career in fitness, but I'd like to put a different spin on it: You are here as a health professional. Some say the body and mind are connected. I believe that's an understatement; they're actually the same thing. Like the ancient proverb says: "Sound body, sound mind."
To provide the necessary level of motivation for your clients, it is necessary to feel them out. Just as we must step up our motivational game for some, we must recognize the possibility of being too overzealous with others.
                </textarea>            	
            </div>
            <div class="span3">
                <?php 
                        $this->widget('yiiwheels.widgets.highcharts.WhHighCharts',
                                array(
                                'pluginOptions' => array(
                                     'plotOptions'=>array('column'=>array('pointPadding'=>0.3,'borderWidth'=>0)),
                                        'credits' => array('enabled' => false),
                                        'exporting' => array('enabled' => false),
                                'title' => array(
                                            'text' => 'Calories Intake'),
                                'chart' =>array(
                                            'type' => 'column'), 
                                'xAxis' => array(
                                            'categories' => array(
                                                 'Intake')),
                                'yAxis' => array(
                                    'min'=>20,
                                    'title' => array(
                                        'text' => 'Calories Intake')),
                                    'series' => array(
                                            array('name' => 'Intake',
                                                'data' => array(UserFoodintake::model()->getCaloriegraph())),
                                        )
                                    ),
                                    'htmlOptions'=>array('id'=>'foodcaloriecontainer','style'=>'height:225px;width:225px'),
                        )
                        );
    ?>
            </div>
        </div>        
        <div class="row-fluid mrg1">
        	<div class="span12">
                
            
        <?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'dataProvider' => UserFoodintake::model()->getfoodintakes(),
                        'template' => "{items}\n{extendedSummary}",
                        'afterAjaxUpdate'=>'js:function(id,data){
                           function requestData() {
                                $.ajax ({
                                           type:"POST" ,
                                           url: "'.CController::createUrl("UserWorkouts/getFooddata").'",
                                         success: function(response,point) {
                                         var series = chart.series[0];
                                         chart.series[0].setData(eval(response),true, false);
                                         //chart.series[0].addPoint(response); // add the point
                                         //setTimeout(requestData, 5000);    // call it again after one second
                                           },
                                    cache: false
                                   });
                                }  
                                            var chart;
                                            chart = new Highcharts.Chart({
                                            chart: {
                                                renderTo: "foodcaloriecontainer",
                                                type: "column",
                                                events: {
                                                    load: requestData   
                                                }
                                            },
                                            credits: {
                                                    enabled: false
                                                },
                                                 exporting: {
                                                            enabled: false
                                                        },
                                            title: {
                                                text: "Calories Burned"
                                            },
                                             xAxis: {
                                                    categories: ["Burned"]
                                                    },
                                                    plotOptions: {
                                                            series: {
                                                                pointPadding: 0.3
                                                            }
                                                        },
                                            yAxis: {
                                                title: {
                                                    text: "Calories Burned"
                                                },
                                            },
                                            series: [{
                                                name: "Burned",
                                                 data:[] 
                                            }]
                                       });
                                 }',
            
                        'columns' => array(
                                        array('header'=>'S.No.',
                                                        'value'=>'++$row',
                                               ),
                                             array('header'=>'Meal Name',
                                                        'name'=>'name',
                                               ),
                                             array('header'=>'Meal Type',
                                                        //'name'=>'foodtype_id',
                                                        'value'=>'$data->foodtype->name',
                                               ),
                                             array('header'=>'Serving Size',
                                                        'name'=>'mealsize',
                                               ),
                                            'calories',
                                            	array(
                                                'header' => 'Delete',
                                                'class' => 'CButtonColumn',
                                                'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteFoodintake",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_action_set'),
                                                    ),
                                                ),

                                                'htmlOptions' => array('width' => '8%')
                                            ),
                            ),
                            
    ));?>
                    </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
                    
            	    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'user-foodintake-form',
                                'action'=>array('UserWorkouts/Addfoodnotes'),
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));?>
                      <fieldset>
                          <input type="hidden" value="" id="mnote" name="mdate">
                        <legend>User Notes</legend>
                        <div class="span12" id="foodintakenote"></div>
                        <textarea placeholder="Type something..." name="notes"></textarea>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserWorkouts/Addfoodnotes'),array( 'success' => 'js:function(resp){
                                    $("#foodintakenote").html(resp)
                                    }',),array('class'=>'btn btn-primary'));?>
                        </fieldset>
                    <?php $this->endWidget(); ?>
            </div>
        </div>
      </div>
       <!--End Of Calories intake Tab--->
       
       <!---Progress Tabs Starts-->
       <div class="tab-pane" id="progress">
        <div class="progress-tab">
            <div class="btn-group">
                <a class="btn active" href="#" id="1week">1 week</a>
                <a class="btn" href="#" id="2week">2 weeks</a>
                <a class="btn" href="#" id="3week">3 weeks</a>
                <a class="btn" href="#" id="1month">month</a>
                <a class="btn" href="#" id="2month">2 months</a>
                <a class="btn" href="#" id="3month">3 months</a>
                <a class="btn" href="#" id="6month">6 months</a>
                <a class="btn" href="#" id="9month">9 months</a>
                <a class="btn" href="#" id="1year">12 months</a>
            </div>
            <div class="row-fluid">
<!--                <h3>Coming Soon!</h3>-->
            	<div class="span9">
                        <?php 
                        $this->widget(  'yiiwheels.widgets.highcharts.WhHighCharts', array(
                        'pluginOptions' => array(
                                    'title' => array('text' => 'Calories Burned Vs Calorie Consumed'),
                                    'credits' => array('enabled' => false),
                                    'exporting' => array('enabled' => false),
                                    'xAxis' => array(
                                         'title' => array('text' => 'Calories'),
                                        'categories' => UserWorkouts::model()-> getprogressburneddate(1)
                                    ),
                                    'yAxis' => array(
                                        
                                        'title' => array('text' => 'Calories')
                                    ),
                                    'series' => array(
                                        array('name' => 'Consumed', 'data' => UserWorkouts::model()-> getprogressconsumed(1)),
                                        array('name' => 'Burned', 'data' => UserWorkouts::model()-> getprogressburned(1))
                                    )
                                ),
                            'htmlOptions'=>array('id'=>'progresschart','style'=>'height:400px;width:600px'),
                            )
                    );?>
                    <!--<img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/cardio-graph.gif" width="100%" alt="" />-->
                </div>
                <div class="span3">
                	<div class="select-area text-right">
                   	  <select name="">
                        	<option>Calorie</option>
                            <option>Measurements</option>
                            <option>Calories Burned</option>
                        </select>
                    </div>
                    <div class="select-area text-right">
               	    <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/calendar.gif" alt="" /> </div>
                </div>
            </div>
        </div>
      </div>
       <!---End Of Progress Tab---->
       
       <!----Start of Recommendation tab-->
       <div class="tab-pane" id="recommendation">
           <h3>Coming Soon!</h3>
<!--        <div class="row-fluid">        	
            <ul class="thumbnails">
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food01.jpg" alt="" />
						<h5>Top 5 Most Fattening Thanks Giving Food</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food02.jpg" alt="" />
						<h5>6 Ways to Incorporate Pumpkin into Your Meals</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food03.jpg" alt="" />
						<h5>Is Your Diet as Temporany as Your Halloween Costume?</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
            </ul>
            <ul class="thumbnails">
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food01.jpg" alt="" />
						<h5>Top 5 Most Fattening Thanks Giving Food</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food02.jpg" alt="" />
						<h5>6 Ways to Incorporate Pumpkin into Your Meals</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
                <li class="span4">
                    <div class="thumbnail">
                        <img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/food03.jpg" alt="" />
						<h5>Is Your Diet as Temporany as Your Halloween Costume?</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s.</p>
                        <p><a href="#">Learn More &raquo;</a></p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="row-fluid">
      <div class="pagination pagination-right">
    <ul>
    <li class="disabled"><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">&raquo;</a></li>
    </ul>
    </div>
  </div>-->
      </div>
       <!---End of recommendation tab---->
       
       <!---Start of measurement tab---->
       <div class="tab-pane" id="measurement">
        <h1>Measurement <span><?php echo Date('l, F, d, Y'); ?></span></h1>
        <div class="row-fluid">
            <div class="span8">
            <h5><i><img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/green-d-arrow.gif" alt="" /></i>What type of measurement do you want to add?</h5>
      <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-measurements-form',
        'action'=>array('UserMeasurements/Addmeasurements'),
	'enableAjaxValidation'=>true,
          'enableClientValidation'=>true,
        'htmlOptions'=>array('class'=>'form-inline'),
        ));?>
            
        <ul>
        	<li>
            	<select class="mes-type" name="bodymeasure">
                <option value="1">Weight</option>
                <option value="2">Body</option>
                </select>                 
                <button type="submit" class="btn">Add Entry</button>
            </li>
            <li style="display:none" id="mesurements">
                <div class="mes-row"><label>Neck</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'neck',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                    
                </div>
                <div class="mes-row"><label>Arms</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'arms',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div> 
                <div class="mes-row"><label>Chest</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'chest',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div> 
                <div class="mes-row"><label>Waist</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'waist',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div> 
                <div class="mes-row"><label>Hips</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'hips',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div>
                <div class="mes-row"><label>Thighs</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'thighs',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div> 
                <div class="mes-row"><label>Calves</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'calves',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div> 
                <div class="mes-row"><label>Forearms</label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'forearms',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'in')
                                        )
                                    );?>
                </div>
            </li>
            <li id="weights">
                <label>Weight: </label>
                    <?php $this->widget('yiiwheels.widgets.maskinput.WhMaskInput',array(
                                    'model' => $measure,
                                    'attribute'=>'weight',
                                    'mask' => '111',
                                    'htmlOptions' => array('span'=>5,'placeholder'=>'Kg')
                                        )
                                    );?>
            </li>
        </ul>
      
            </div>
            
            <div class="span4 text-right" ><label>Date:</label>
                <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                    'model' => $measure,
//                    'attribute'=>'adddate',
                    'name'=>'measuredate',
                    'value'=>  date('m/d/Y'),
                    
                    'pluginOptions' => array(
                    'format' => 'mm/dd/yyyy',
                        
                    ),
                    'events'=>array('changeDate'=>'js:function(ev){
                        var d = ev.date;
                        var year = d.getFullYear();
                        var month = d.getMonth()+1;
                        var date = d.getDate();
                        var time = "00:00:00";
                        var curdate = year+"-"+month+"-"+date+" "+time ;
                        $("#mnote").val(curdate);
                        }'),
                    'htmlOptions'=>array('display'=>'inline','class'=>'measuredates'),
                    ));
?>
                <!--<img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/calendar.gif" alt="" />-->
            </div>
             <?php $this->endWidget(); ?>
        </div>
        
        <div class="row-fluid mrg1">
        	<?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'dataProvider' => UserMeasurements::model()->Usercurweight(),
                        'template' => "{items}\n{extendedSummary}",
                        'columns' => array(
                                            array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'weight',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editweight'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                            array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'arms',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editarms'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                            array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'calves',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editcalves'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                            array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'chest',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editchest'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                            array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'forearms',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editforearms'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                             array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'hips',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Edithips'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                             array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'neck',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editneck'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                             array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'thighs',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserMeasurements/Editthighs'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                             array(
                                                'header' => '',
                                                'class' => 'CButtonColumn',
                                                'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("UserMeasurements/Deletemeasurement",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_action_set'),
                                                    ),
                                                ),

                                                'htmlOptions' => array('width' => '8%')
                                            ),
                            ),
                            
    ));?>
        </div>
        
        <div class="row-fluid">
        	<div class="span12">
                    
            	    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'user-measurements-form',
                                'action'=>array('UserMeasurements/Addnotes'),
                                'enableAjaxValidation'=>false,
                                'htmlOptions'=>array('class'=>'form-inline'),
                                ));?>
                      <fieldset>
                          <input type="hidden" value="" id="mnote" name="mdate">
                        <legend>User Notes</legend>
                        <div class="span12" id="measurenote"></div>
                        <textarea placeholder="Type something..." name="notes"></textarea>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserMeasurements/Addnotes'),array( 'success' => 'js:function(resp){
                                    $("#measurenote").html(resp)
                                    }',),array('class'=>'btn btn-primary'));?>
                        </fieldset>
                    <?php $this->endWidget(); ?>
            </div>
        </div>
      </div>
       <!---End of measurement tab---->
     
  </div>
      </div>
    </div>
  </div>
    </div>


<script>
    $(document).ready(function(){
        
        $('#add-workout').on('shown', function() {
        $("#workout-form")[0].reset();
        $("#addentry").attr("disabled", "disabled");
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
        $('#workouts').html('');
        $('#work_id').val('');
        
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
        } else {
            $("#addentry").removeAttr("disabled", "disabled");
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
           $('#hiddenworkid').val(id);
           $('#exerciseid').val(exerciseid);
           if(worktype==1){
               $('li.distance').css('display','none');
               $('li.weight').css('display','block');
               $('#exercisetype').val('1');
           }
           else{
               $('li.distance').css('display','block');
                $('li.weight').css('display','none');
                $('#exercisetype').val('');
           }
        });
    /**Adding a food item via list items*/
        $(document).on('click','a.fooditem',function(){
           var itemname = $(this).html();
           var id =$(this).attr('foodtypeid');
            var foodid =$(this).attr('food');
           $('#search-fooditems').val(itemname);
            $("#addfoodentry").removeAttr("disabled", "disabled");
           $('#hiddenfoodtypeid').val(id);
           $('#foodid').val(foodid);
           
        });
    /**Change event of body measurements dropdown**/
        $('select[name=bodymeasure]').change(function(e,u){
            var shifter =$(this).val();
            if(shifter == 2){
                $('#mesurements').css('display','block');
                $('#weights').css('display','none');
            } else if(shifter == 1){
                $('#mesurements').css('display','none');
                $('#weights').css('display','block');
            }
        });
/**Tab click on progress bar for date changes*/
    $(document).on('click','#progress a.btn',function(e){
        var dur = $(this).attr('id');
        if(dur == '2week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
             function requestData(response,point) {
            $.ajax({
                url:'',
                type:'POST',
                data:{week:'2'},
                url: '<?php echo CController::createUrl("UserWorkouts/getProgress") ?>',
                success: function (response,point) {
                       var dataArray = jQuery.parseJSON(response);
                       var oneArray = dataArray.splice(0,14);
                       var twoArray = dataArray;
                       var ay = <?php echo CJSON::encode(UserWorkouts::model()-> getprogressburneddate(2)); ?>;
    //                     for (var i=0, len=14; i < len; i++) { oneArray[i] = dataArray[i]; }
    //                     for (var j=14, len=28; j < len; j++) { twoArray[j] = dataArray[j]; }
                        var series = chart.series[0];
                         chart.xAxis[0].setCategories();
                        chart.series[1].setData(eval(oneArray),false,true);
                        chart.series[0].setData(eval(twoArray),false,true);
                       chart.xAxis[0].setCategories(ay, true,true);
//                       chart.xAxis[0].setData(eval(ay),true,false);
                        //chart.series[0].addPoint(response); // add the point
                        //setTimeout(requestData, 5000);    // call it again after one second
                          },
                   cache: false
                  });}
                  
              }
         if(dur == '1week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
             function requestData(response,point) {
            $.ajax({
                type:'POST',
                data:{week:'1'},
                url: '<?php echo CController::createUrl("UserWorkouts/getProgress") ?>',
                success: function (response,point) {
                       var oneArray = <?php echo json_encode(UserWorkouts::model()-> getprogressburned(1)); ?>;
                       var twoArray = <?php echo json_encode(UserWorkouts::model()-> getprogressconsumed(1)); ?>;
                       var ay = <?php echo json_encode(UserWorkouts::model()-> getprogressburneddate(1)); ?>;
    //                     for (var i=0, len=14; i < len; i++) { oneArray[i] = dataArray[i]; }
    //                     for (var j=14, len=28; j < len; j++) { twoArray[j] = dataArray[j]; }
                        var series = chart.series[0];
                        chart.series[1].setData(eval(oneArray),false, true);
                        chart.series[0].setData(eval(twoArray),false, true);
                       chart.xAxis[0].setCategories(ay,true,true);
                        //chart.series[0].addPoint(response); // add the point
//                        setTimeout(requestData, 5000);    // call it again after one second
                          },
                   cache: false
                  });}
              }      
                       var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "line",
                           events: {
                               load: requestData   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Burned Vs Calorie Consumed"
                       },
                        xAxis: {
                            
                               categories: [],
                               },
                              
                       yAxis: {
                           title: {
                               text: "Calories"
                           },
                       },
                       series: [{
                           name: "Consumed",
                            data:[] 
                       },{
                           name: "Burned",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
            });
    
})
</script>
