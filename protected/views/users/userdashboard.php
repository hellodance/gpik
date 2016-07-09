<style>
    #work-schedule .table thead th,#calories .table thead th{font-weight:bold;}
    .table-row {
    height: 176px;
/*    margin-bottom: 10px;*/
    overflow: auto;
    border-left: thin solid #E5E5E5;
}
.error{color: red;}
    a.delete{
        height: 29px;
    }
    .delete img{
         border: none !important;
    float: left;
    margin-right: 15px;
    padding: 5px;
    }
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
<div id="add-workout" class="modal hide fade workout-modal"  tabindex="-1">
    <div class="ajaxload" style="display:none"><div style="" id="blockui"><div id="loaderimg" class=""><img align="middle" src="<?php echo Yii::app()->request->baseUrl ?>/images/loader.gif" valign="middle" style="left: 40%;position: relative;"></div></div></div>
    <!--<div class="ajaxload" style="display:none"><img src="<?php //echo Yii::app()->request->baseUrl ?>/images/loader.gif"></div>-->
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Add Workout</h3>
  </div>
   
  <div class="modal-body">  
    <div class="column3"> 
    	<h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>Which exercise did you perform ?</h5>
        
            
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
//                'disabled'=>'disabled',
                'class' => 'exer-type',
                'id' => 'search-services',
//                'value' => 'e. g. full arms',
//                'onblur'=>"if(this.value==''){this.value='e.g.Bicycle'}", 
//                'onclick'=>"if(this.value=='e.g.Bicycle'){this.value=''}"
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
                                                                        'events'=>array(
                                                                            'show'=>'js:function(ev){ }',
                                                                            'changeDate'=>'js:function(ev){ console.log(ev)}'
                                                                        ),
                                                                        'name'=>'date',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                        'startDate'=> '-15d',
                                                                        'endDate'=> '+0d',
                                                                    'render'=>'js:function(nowdate){
                                                                        }',
                                                                        
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
                    <?php if($allworks){ ?>
                    <ul id="recworkouts" class="workout-list">
                      <?php  
                      foreach($allworks as $modelq){ ?>
                	<li><a href="#" worktype="<?php echo $modelq->worktype->type; ?>" exercise="<?php echo $modelq->workout_id; ?>" typeid="<?php echo $modelq->worktype_id; ?>" class="workitem" id="workitem_<?php echo $modelq->workout_id; ?>"><?php echo $modelq->name; ?></a></li>
                      <?php }?>
                        </ul>
                    <?php }else { echo 'No Recent item available.';}?>
                </div>
            </div>
        </div>
    </div>
  </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="worksub" data-toggle="modal" role="button" href="#">Submit</a> </div>
</div>
<!--------End of Add Workout Popup------------->

<!--------Enter Daily Meals Popup-------------->
<div id="add-food" class="modal hide fade workout-modal calories">
  <div class="modal-header">
  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
  $mealtype = array(1=>'Breakfast',2=>'Morning Snack',3=>'Lunch',4=>'Afternoon Snack',5=>'Dinner',6=>'Evening Snack');
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
//                'disabled'=>'disabled',
                'class' => 'food-type',
                'id' => 'search-fooditems',
//                'value' => 'e. g. full arms',
//                'onblur'=>"if(this.value==''){this.value='e.g.Bycycle'}", 
//                'onclick'=>"if(this.value=='e.g.Bycycle'){this.value=''}"
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
                                                                        'startDate'=> '-15d',
                                                                        'endDate'=> '+0d',
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
                                                                            'beforeSend'=>'js:function(){
                                                                                $("#foods").html($(".ajaxload").html());
                                                                                }',
                                                                            //Style: CController::createUrl('currentController/methodToCall')
                                                                            'update'=>'#foods',
                                                                            'success'=>'js:function(data){
                                                                                $("#foods").html(data);
                                                                                }',
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
                	 <?php if($allfoods){ ?>
                    <ul id="recworkouts" class="workout-list">
                      <?php  
                      foreach($allfoods as $modelw){ ?>
                       
                	<li><a href="#" food="<?php echo $modelw->fooditem_id; ?>" foodtypeid="<?php echo $modelw->foodtype_id; ?>" class="fooditem" id="fooditem_<?php echo $modelw->fooditem_id; ?>"><?php echo $modelw->name; ?></a></li>
                      <?php }?>
                        </ul>
                    <?php }else { echo 'No Recent item available.';}?>
                </div>
            </div>
        </div>
    </div>
  </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="foodsub" data-toggle="modal" role="button" href="#">Submit</a> </div>
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
            <div class="span9 ws-quotes">
               <blockquote>
                   <span>Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?</span><i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/btm-quote-icon.png" alt="" /></i>
                  </blockquote>      
            </div>
<!--           <div class="span9" style="width:72%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/customized_workout.jpg" alt="" />
             <p><strong><u>Perfectly Customized Workout Plans From a Real Life Trainer for Real Results</u></strong></p><p class="tabindent"><span>&#10004;</span>Add your workout details to help you keep on track.</p><p class="tabindent"><span>&#10004;</span> Find a certified trainer cum devoted friend.</p><p class="tabindent"><span>&#10004;</span> At-home or at the gym, 
             you always have your plan</p>           
            </div>-->
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
                                            array('name' => 'Cardio',
                                                'data' => array(UserWorkouts::model()->getCaloriegraph())),
                                        array('name' => 'Weight',
                                                'data' => array(UserWorkouts::model()->getweightCaloriegraph())),
                                        array('name' => 'Total',
                                                'data' => array(UserWorkouts::model()->gettotalcalories()+ UserWorkouts::model()->getweighttotalcalories())),
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
        "$(document).on('change','#grid_cardio_workout .status',function() {
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
                        'htmlOptions'=>array('id'=>'grid_cardio_workout','class'=>'table table-bordered table-row'),
                        'afterAjaxUpdate'=>'js:function(id,data){
                           function requestData() {
                                $.ajax ({
                                            type:"POST" ,
                                            url: "'.CController::createUrl("UserWorkouts/getData").'",
                                            success: function(response,point) {
                                             $.ajax ({
                                                type:"POST" ,
                                                url: "'.CController::createUrl("UserWorkouts/getweightcalData").'",
                                                success: function(resp,point) {
                                                            var series = chart.series[0];
                                                                        $.ajax ({
                                                                            type:"POST" ,
                                                                            url: "'.CController::createUrl("UserWorkouts/gettotalcalData").'",
                                                                            success: function(totalresp,point) {
                                                                                    var totalcals = totalresp;
                                                                                    
                                                                                    chart.series[0].setData(eval(response),false, true);
                                                                                    chart.series[1].setData(eval(resp),false, true);
                                                                                    chart.series[2].setData(eval(totalresp),true, true);
                                                                                            }
                                                                                });
                                                                            } 
                                                    });
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
                                                name: "Cardio",
                                                 data:[]
                                                 
                                                },{
                                                    name: "Weight",
                                                     data:[] 
                                                },
                                                {
                                                    name: "Total",
                                                     data:[] 
                                                }],
                                       });
                                 }',
                        'columns' => array(
                                          array('header'=>'Cardio',
                                                'type'  => 'raw',
                                                    'name'=>'name',
                                                    'sortable'=>false,
                                              'value' => 'CHtml::link($data->name, Yii::app()->controller->createUrl("Editworkout",array("id"=>$data->primaryKey)))',
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
                                            'emptytext'  => '0',
                                             
                                                
                                            )), array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'speed',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editspeed'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            'emptytext'  => '0',
                                                
                                            )),array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'incline',
                                            'sortable'=>false,
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editincline'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            'emptytext'  => '0',
                                            )),array(
                                            'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                            'name' => 'level',
                                            'sortable'=>false,
//                                                'footer'=>'<b>Total: </b>',
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editlevel'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            'emptytext'  => '0',
                                            )),
                                            array('header'=>'Calories',
//                                                        'name'=>'calories',
                                                             'sortable'=>false,
                                                             'value'=>'round($data["calories"],2)'
//                                                        'footer'=>UserWorkouts::model()->gettotalcalories(),
                                                        ),
                                                        array('header'=>'Duration',
                                                        'name'=>'duration',
                                                             'sortable'=>false,
//                                                        'footer'=>UserWorkouts::model()->gettotalduration(),
                                                        ),
                                             array(
                                                'header' => 'Delete',
                                                'class'=>'bootstrap.widgets.TbButtonColumn',
                                                 'afterDelete'=>'function(link,success,data){ if(success){ 
                                                     jQuery.ajax({
                                                            type: "POST",
                                                            url: "'.CController::createUrl("UserWorkouts/getcalData").'",
                                                            success:function(data) {
                                                            $("#cardio_workout #totalcals").html(data); }
                                                             });
                                                      }}',
                                                 'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                                                        'label' => 'Delete',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'icon-trash',
                                                        ),
                                                        'visible'=>'$data->status=="0"',
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_cardio_workout'),
                                                    ),
                                                ),
                                                'htmlOptions' => array('width' => '6%')
                                            ),
                                                array(
                                                        'name'  => '',
                                                        'type'  => 'raw',
                                                        'value' => '$data->statusDropdown',
//                                                        'htmlOptions' => array('id' => 'completestatus')
                                                    ),
                                        ),
    ));?><div id="cardio_workout" class="table table-bordered table-row"  style="height:30px; overflow: hidden;">
                    <table class="footer-table items table table-bordered">
                        <tr class="odd">
                            <td width="367px" style="border-right: none">&nbsp;</td>
                            <td width="54px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40.0px" style="border-left: none;border-right: none"><b>Total: </b></td>
                            <td width="111px" id="totalcals" style="border-left: none;border-right: none"><?php echo round(UserWorkouts::model()->gettotalcalories(),2); ?></td>
                            <td width="54px" style="border-left: none;border-right: none"> </td>
                            <td width="0%" style="border-left: none;border-right: none"> </td>
                            <td width="76px" style="border-left: none;" >  </td></tr>
                    </table>
            </div>
                </div>
        </div>
        <div class="row-fluid mrg1">
        	<div class="span12">
     <?php
     $url2 = $this->createUrl('TrainerDetails/toggle');
Yii::app()->clientScript->registerScript('initStatusweight',
        "$(document).on('change','#grid_weight_workout .status',function() {
              el = $(this);
            $.ajax({
            url:'$url2', 
                data:{status: el.val(), id: el.data('id')},
                 success: function(response) {
                
                 $.fn.yiiGridView.update('grid_weight_workout');
                 }
                })
            });",
    CClientScript::POS_READY);
     
     $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'bordered',
                        'htmlOptions'=>array('id'=>'grid_weight_workout','class'=>'table table-bordered table-row'),
                        'dataProvider' => UserWorkouts::model()->getweightWorkouts(),
                        'template' => "{items}",
                        'afterAjaxUpdate'=>'js:function(id,data){
                           function requestData() {
                                $.ajax ({
                                            type:"POST" ,
                                            url: "'.CController::createUrl("UserWorkouts/getData").'",
                                            success: function(response,point) {
                                             $.ajax ({
                                                type:"POST" ,
                                                url: "'.CController::createUrl("UserWorkouts/getweightcalData").'",
                                                success: function(resp,point) {
                                                            var series = chart.series[0];
                                                                        $.ajax ({
                                                                            type:"POST" ,
                                                                            url: "'.CController::createUrl("UserWorkouts/gettotalcalData").'",
                                                                            success: function(totalresp,point) {
                                                                                    var totalcals = totalresp;
                                                                                    
                                                                                    chart.series[0].setData(eval(response),false, true);
                                                                                    chart.series[1].setData(eval(resp),false, true);
                                                                                    chart.series[2].setData(eval(totalresp),true, true);
                                                                                            }
                                                                                });
                                                                            } 
                                                    });
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
                                                name: "Cardio",
                                                 data:[]
                                                 
                                                },{
                                                    name: "Weight",
                                                     data:[] 
                                                }, {
                                                    name: "Total",
                                                     data:[] 
                                                }],
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
                                            array('header'=>'Weight Training',
                                                    'name'=>'name',
                                                    'sortable'=>false,
                                                ),
                                             array(
                                                    'name'=>'set1',
                                                    'value'=>array($this,'gridSet1Column'),
                                                    'sortable'=>false,'htmlOptions' => array('width' => '8%')
                                                ),array(
                                                    'name'=>'set2',
                                                    'value'=>array($this,'gridSet2Column'),
                                                  'sortable'=>false,
                                                  'htmlOptions' => array('width' => '8%')
                                                ),array(
                                                    'name'=>'set3',
                                                    'value'=>array($this,'gridSet3Column'),
                                                    'sortable'=>false, 
//                                                    'footer'=>'<b>Duration: </b>',
                                                    'htmlOptions' => array('width' => '8%')
                                                ),array(
                                                    'name'=>'set4',
                                                    'value'=>array($this,'gridSet4Column'),
                                                    'sortable'=>false, 
//                                                    'footer'=>UserWorkouts::model()->getweighttotalduration(),
                                                    'htmlOptions' => array('width' => '8%')
                                                ),array(
                                                    'name'=>'set5',
                                                    'value'=>array($this,'gridSet5Column'),
                                                    'sortable'=>false, 
//                                                    'footer'=>'<b>Calories: </b>',
                                                    'htmlOptions' => array('width' => '8%')
                                                ),array(
                                                    'name'=>'set6',
                                                    'value'=>array($this,'gridSet6Column'),
                                                    'sortable'=>false,
//                                                    'footer'=>UserWorkouts::model()->getweighttotalcalories(),
                                                    'htmlOptions' => array('width' => '8%')
                                                ),
                                            
                                            	array(
                                                'header' => 'Delete',
                                                 'class'=>'bootstrap.widgets.TbButtonColumn',
                                                    'afterDelete'=>'function(link,success,data){ if(success){ 
                                                     jQuery.ajax({
                                                            type: "POST",
                                                            url: "'.CController::createUrl("UserWorkouts/gettotalweightcalData").'",
                                                            success:function(data) {
                                                            $("#weight_workout #totalcals").html(data); }
                                                             });
                                                      }}',
                                                'template' => '{delete}',
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                                                        'label' => 'Delete',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'icon-trash',
                                                        ),
                                                        'visible'=>'$data->status=="0"',
                                                    ),
                                                    'update' => array(
                                                        'options' => array('class' => 'grid_weight_workout'),
                                                    ),
                                                ),

                                                'htmlOptions' => array('width' => '6%')
                                            ),
                                    array(
                                                        'name'  => '',
                                                        'type'  => 'raw',
                                                        'value' => '$data->statusDropdown',
                                                        'htmlOptions' => array('width' => '6%')
                                                    ),
                          
                                        ),
                           
    ));?>
        <div id="weight_workout" class="table table-bordered table-row"  style="height:30px; overflow: hidden;border-left: none;border-right: none">
                    <table class="footer-table items table table-bordered">
                        <tr class="odd">
                            <td width="367px" style="border-right: none">&nbsp;</td>
                            <td width="54px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40px" style="border-left: none;border-right: none">&nbsp;</td>
                            <td width="40.0px" style="border-left: none;border-right: none"><b>Total: </b></td>
                            <td width="111px" id="totalcals" style="border-left: none;border-right: none"><?php echo round(UserWorkouts::model()->getweighttotalcalories(),2); ?></td>
                            <td width="54px" style="border-left: none;border-right: none"> </td>
                            <td width="0%" style="border-left: none;border-right: none"> </td>
                            <td width="76px" style="border-left: none;">  </td>
                        </tr>
                    </table>
            </div>
            </div>
        </div>
        <!---Exercise Journal Ends----->
        <?php if($worknote){ ?>
        <div class="row-fluid">
        	<div class="span12 mrg1">
              <textarea rows="5" disabled="disabled">
                <?php echo $worknote->note; ?>
                </textarea>            	
            </div>
            
        </div>
        <?php } ?>
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
                        <div class="span11" id="workoutnote" style="display:none;"></div>
                        <textarea  name="notes" id="worknote" ></textarea>
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
            <div class="span9 ci-quotes">
            	  <blockquote>
                     <span>	Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?</span><i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/btm-quote-icon.png" alt="" /></i>
                  </blockquote>     	
            </div>
<!--        	<div class="span9" style="width:72%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/customized_workout.jpg" alt="" />
             <p><strong><u>Perfectly Customized Workout Plans From a Real Life Trainer for Real Results</u></strong></p><p class="tabindent"><span>&#10004;</span>Add your workout details to help you keep on track.</p><p class="tabindent"><span>&#10004;</span> Find a certified trainer cum devoted friend.</p><p class="tabindent"><span>&#10004;</span> At-home or at the gym, 
             you always have your plan</p>           
            </div>-->
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
                                    'htmlOptions'=>array('id'=>'foodcaloriecontainer','style'=>'height:230px;width:260px'),
                        )
                        );
    ?>
            </div>
        </div>        
        <div class="row-fluid mrg1">
        	<div class="span12">
                
            
        <?php 
        $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'bordered',
                        'htmlOptions'=>array('class'=>'table table-bordered table-row'),
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
                                                'headerHtmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                                            'htmlOptions' => array('style'=>'text-align: center;')
                                               ),
                                             array('header'=>'Food',
                                                         'type'  => 'raw',
                                                        'name'=>'name',
                                                        'value' => 'CHtml::link($data->name, Yii::app()->controller->createUrl("Editfood",array("id"=>$data->primaryKey)))',
                                                        'sortable'=>false,
                                                        'htmlOptions' => array('style'=>'text-align: center;')
                                               ),
                                             array(     'header'=>'Meal Type',
                                                        'name'=>'mealtype',
                                                        'type' => 'raw',
                                                        'value'=>array($this, 'mealtype'),
                                                        'sortable'=>false,
                                                        'htmlOptions' => array('width' => '20%','style'=>'text-align: center;')
                                               ),
                                             array('header'=>'Serving Size',
                                                        'name'=>'mealsize',
                                                 'sortable'=>false,
                                                 'htmlOptions' => array('style'=>'text-align: center;')
                                               ),
                                             array(
                                                        'name'=>'calories',
                                                 'sortable'=>false,
                                                 'htmlOptions' => array('style'=>'text-align: center;')
                                               ),
                                          
                                            	array(
                                                'header' => 'Delete',
                                                 'class'=>'bootstrap.widgets.TbButtonColumn',
                                                'template' => '{delete}',
                                                    'htmlOptions' => array('width' => '1%'),
                                                'buttons' => array('delete' =>
                                                    array(
                                                        'url' => 'Yii::app()->controller->createUrl("DeleteFoodintake",array("id"=>$data->primaryKey))',
                                                        'label' => 'Delete',
//                                                        'label' => 'X',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
//                                                             'class' =>'delete',
                                                            'class' =>'icon-trash',
                                                            'style'=>'text-align: center;padding: 0 40% 0 0;float:right;',
                                                        ),
                                                    //    'visible'=>'$data->status=="0"',
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
         <?php if($foodnote){ ?>
        <div class="row-fluid">
        	<div class="span12 mrg1">
              <textarea rows="5" disabled="disabled">
                <?php echo $foodnote->note; ?>
                </textarea>            	
            </div>
            
        </div>
        <?php } ?>
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
                        <div class="span11" id="foodintakenote" style="display:none;"></div>
                        <textarea name="notes" id="foodnote"></textarea>
                        <?php echo TbHtml::ajaxSubmitButton('Submit',array('UserWorkouts/Addfoodnotes'),array( 'success' => 'js:function(resp){
                                    $("#foodintakenote").css("display","block");
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
                <a class="btn" href="#" id="4week">month</a>
                <a class="btn" href="#" id="8week">2 months</a>
                <a class="btn" href="#" id="12week">3 months</a>
                <a class="btn" href="#" id="24week">6 months</a>
                <a class="btn" href="#" id="38week">9 months</a>
                <a class="btn" href="#" id="52week">12 months</a>
            </div>
            <div class="row-fluid">
            	<div class="span9">
                        <?php 
                        $this->widget(  'yiiwheels.widgets.highcharts.WhHighCharts', array(
                        'pluginOptions' => array(
                                    'title' => array('text' => 'Calories Burnt Vs Calories Consumed'),
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
                                        array('name' => 'Burnt', 'data' => UserWorkouts::model()-> getprogressburned(1))
                                    )
                                ),
                            'htmlOptions'=>array('id'=>'progresschart','style'=>'height:400px;width:600px'),
                            )
                    );?>
                    <!--<img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/cardio-graph.gif" width="100%" alt="" />-->
                </div>
                <div class="span3">
                	<div class="select-area text-right">
                   	  <select name="progress-checker" id="progress-checker">
                            <option value="1">Calories Burnt</option>
                            <option value="2">Calories Intake</option>
                            <option value="3" selected="selected">Calories Burnt vs calories intake</option>
                            <!--<option value="4">Measurements</option>-->
                            
                        </select>
                    </div>
                    <div class="select-area text-right">
                        <div id="datepickers"></div>
                </div>
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
                <button type="submit" class="btn" id="add-measurements">Add Entry</button>
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
                       ' startDate'=> '-15d',
                        'endDate'=> '+0d'
                        
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
       
        requestQuote();
        requestfoodQuote();
        function requestQuote(){
        $.ajax({
            url:'<?php echo CController::createUrl("users/Randomquote"); ?>',
            type:'post',
            success:function(responses){
               $('.ws-quotes blockquote span').html(responses);
                setTimeout(requestQuote,5000);
          },
        });
        
}
        function requestfoodQuote(){
                $.ajax({
                    url:'<?php echo CController::createUrl("users/Randomfoodquote"); ?>',
                    type:'post',
                    success:function(resp){
                       $('.ci-quotes blockquote span').html(resp);
                        setTimeout(requestfoodQuote,5000);
                  },
                });
        
}
    /**Reset the workout pop-up on shown*/
        $('#add-workout').on('shown', function() {
        $("#workout-form")[0].reset();
        $("#addentry").attr("disabled", "disabled");
        $("#worksub").attr("disabled", "disabled");
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
        $('#workouts').html('');
        $('#work_id').val('');
        
    });
    /*******************/
    /**Reset the add meal pop-up on shown*/
        $('#add-food').on('shown', function() {
        $("#food-intake-form")[0].reset();
        $("#addfoodentry").attr("disabled", "disabled");
        $("#foodsub").attr("disabled", "disabled");
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
        $('#foods').html('');
        $('#available_food_groups').val('');
        
    });
    /*******************/
    
    $(document).on('click','#worksub',function(){
        $("#addentry").click();
    });
    $(document).on('click','#foodsub',function(){
        $("#addfoodentry").click();
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
            $("#foodsub").attr("disabled", "disabled");
        } else {
            $("#addfoodentry").removeAttr("disabled", "disabled");
            $("#foodsub").removeAttr("disabled", "disabled");
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
    /**Adding a food item via list items*/
        $(document).on('click','a.fooditem',function(){
           var itemname = $(this).html();
           var id =$(this).attr('foodtypeid');
            var foodid =$(this).attr('food');
           $('#search-fooditems').val(itemname);
            $("#addfoodentry").removeAttr("disabled", "disabled");
           $('#hiddenfoodtypeid').val(id);
           $('#foodid').val(foodid);
           $("#foodsub").removeAttr("disabled", "disabled");
           
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
    /**Dynamic enble / disable the Add entry button of measurements to stop garbage input*/
    $("#add-measurements").attr("disabled", "disabled");
    $("#UserMeasurements_weight").bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#add-measurements").attr("disabled", "disabled");
        } else {
            $("#add-measurements").removeAttr("disabled", "disabled");
        }   
    });
    $('.mes-row').each(function(index,vals){
        $(vals).find('input').bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#add-measurements").attr("disabled", "disabled");
        } else {
            $("#add-measurements").removeAttr("disabled", "disabled");
        }   
    });
    })
        
   
            
            /**Clear the data in text area of notes on OK click*/
            $(document).on('click','#workoutnote .ok',function(){
            $(this).parent().parent().parent().next().val('');
            });
            $(document).on('click','#foodintakenote .ok',function(){
            $(this).parent().parent().parent().next().val('');
            });
            /*************/
           /**User alert for nonsaved notes**/
            $(document).on('click','ul.categories li a',function(){
                if($.trim($('#worknote').val())){
                    alert('You have unsaved changes in workout notes.')
                }
                if($.trim($('#foodnote').val())){
                    alert('You have unsaved changes in calorie intake notes.')
                }    
                 });
            /***************/
            /**Validate Time input in workout popup **/
            $('#workout-form').validate({ // initialize the plugin
                                rules: {
                                    datetime_min: {
                                        selectcheck: true
                                    },

                                },
                                    //        submitHandler: function (form) { // for demo
                                    //            alert('valid form submitted'); // for demo
                                    //            return false; // for demo
                                    //        }
                                        });
                 $.validator.addMethod('selectcheck', function(value, element, arg) {
                            return (value != '');
                        }, "Required");
           /****************/ 
           
          
     /**Function return the durations from php to jquery for progress chart updation*/
     function duur(day){
                var resp = 0;
                $.ajax({
                        url:'<?php echo CController::createUrl("UserWorkouts/Caldropburntdataprogressburneddate") ?>',
                        type:'POST',
                        data:{duration:day},
                        async:false,
                        success:function(res){
                           resp = res;
                        }
                    });
                return resp;
            }
           
    /**Tab click on progress bar for date changes*/
    $(document).on('click','#progress a.btn',function(e){
        var dur = $(this).attr('id');
        var checker = $('select[name=progress-checker]').val();
        var duration = parseInt($(this).attr('id').replace(/[^\d]/g, ''), 10);
        function requestData(dur,week) {
            
        $.ajax({
                type:'POST',
                async:false,
                data:{week:week},
                url: '<?php echo CController::createUrl("UserWorkouts/getProgress") ?>',
                success: function (response,point) {
                       var oneArray = $.ajax({
                            type:'POST',
                            async:false,
                            data:{dur:dur},
                            url: '<?php echo CController::createUrl("UserWorkouts/burneddata") ?>',
                            success: function (response) {oneArray = $.parseJSON(response.responseText);}
                            
                       })
//                           console.log(oneArray.responseText)
                           <?php //echo json_encode(UserWorkouts::model()-> getprogressburned(dur)); ?>;
                       var twoArray = $.ajax({
                            type:'POST',
                            async:false,
                            data:{dur:dur},
                            url: '<?php echo CController::createUrl("UserWorkouts/consumedddata") ?>',
                            success: function (response) {twoArray = $.parseJSON(response.responseText);}
                            
                       })
                           <?php //echo json_encode(UserWorkouts::model()-> getprogressconsumed(dur)); ?>;
                       var ay = $.ajax({
                            type:'POST',
                            async:false,
                            data:{dur:dur},
                            url: '<?php echo CController::createUrl("UserWorkouts/processdate") ?>',
                            success: function (response) {ay = $.parseJSON(response.responseText);}
                            
                       })
                           <?php //echo json_encode(UserWorkouts::model()-> getprogressburneddate(3)); ?>;
                        var series = chart.series[0];
                        chart.series[1].setData(eval(oneArray.responseText),false, true);
                        chart.series[0].setData(eval(twoArray.responseText),false, true);
                        chart.xAxis[0].setCategories(eval(ay.responseText),true,true);
                       
                        //chart.series[0].addPoint(response); // add the point
//                        setTimeout(requestData, 2);    // call it again after one second
                          },
                   cache: false
                  });}
                var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "line",
                           events: {
                                load: function(event) {
                                   
                                    }
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Burnt Vs Calories Consumed"
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });  
        if(checker == 3){
        
        if(dur == '1week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
             requestData(duration,'1')
              }
        if(dur == '2week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
            requestData(duration,'2')
                  
              }
        if(dur == '3week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
            
             $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '4week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
              $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '8week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
             $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '12week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
             $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '24week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
              $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '38week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
              $(chart).bind('load', requestData(duration,'3'));
              }
        if(dur == '52week'){
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
              $(chart).bind('load', requestData(duration,'3'));
              }
                       
                  }
        if(checker == 1){
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        
        function requestdropchartDataburnt(response,point) {
                $.ajax({
                        type:'POST',
                        data:{drop:'1',duration:duration},
                        url: '<?php echo CController::createUrl("UserWorkouts/Caldropburntdata") ?>',
                        success: function (response,point) {
                               var dataArray = jQuery.parseJSON(response);
                              // var oneArray = dataArray.splice(0,14);
                                var twoArray = response;
                                if(response){
                                var dy =  jQuery.parseJSON(duur(duration));
                                var series = chart1.series[0];
                                //chart.series[1].setData(eval(oneArray),false,true);
                                chart1.series[0].setData(eval(twoArray),false,true);
                                chart1.xAxis[0].setCategories(dy,true,true);}
        //                       chart.xAxis[0].setCategories(ay, true,true);
        //                       chart.xAxis[0].setData(eval(ay),true,false);
                                //chart.series[0].addPoint(response); // add the point
                                //setTimeout(requestData, 5000);    // call it again after one second
                                  },
                           cache: false
                    });}
           
                    var chart1;
                       chart1 = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "line",
                           events: {
                               load: requestdropchartDataburnt   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Burnt"
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
                  }
        if(checker == 2){
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        function requestdropchartDataintake(response,point) {
                $.ajax({
                        type:'POST',
                        data:{drop:'1',duration:duration},
                        url: '<?php echo CController::createUrl("UserWorkouts/Caldropintakedata") ?>',
                        success: function (response,point) {
                               var dataArray = jQuery.parseJSON(response);
                              // var oneArray = dataArray.splice(0,14);
                                var twoArray = response;
                                if(response){
                                var dy =  jQuery.parseJSON(duur(duration));
                                var series = chart2.series[0];
                                //chart.series[1].setData(eval(oneArray),false,true);
                                chart2.series[0].setData(eval(twoArray),false,true);
                                chart2.xAxis[0].setCategories(dy,true,true);}
        //                       chart.xAxis[0].setCategories(ay, true,true);
        //                       chart.xAxis[0].setData(eval(ay),true,false);
                                //chart.series[0].addPoint(response); // add the point
                                //setTimeout(requestData, 5000);    // call it again after one second
                                  },
                           cache: false
                    });}
           
                    var chart2;
                       chart2 = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "line",
                           events: {
                               load: requestdropchartDataintake   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Intake"
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
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
                  }
        
            });
     /*****/       
    /**Change of progress chart through Dropdown**/
    $(document).on('change','select[name=progress-checker]',(function(e,u){
            var shifter =$(this).val();
            var duration = parseInt($('#progress a.active').attr('id').replace(/[^\d]/g, ''), 10);
           if(shifter == 1){
                var activa1 = $('#progress a.active');
           $(activa1).click();
           return false;
           }
           if(shifter == 2){
               var activa2 = $('#progress a.active');
           $(activa2).click();
           return false;
           }
           if(shifter == 3){
           var activa = $('#progress a.active');
           $(activa).click();
           return false;
           }
           
           var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "line",
                           events: {
                               load: requestdropchartData   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Burnt Vs Calories Consumed"
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
        }));
        /*********/
   /***Change the Progress graph on click of calendar***/  
    $("#datepickers").datepicker({
            changeMonth: false,
            changeYear: false,
            startDate: '-15d',
            endDate: '+0d'
        }).on('changeDate', function(ev){
            var dd = ev.date.getDate();
            
            var mm = ev.date.getMonth()+1;
            var yy = ev.date.getFullYear();
            var cheker = $('select[name=progress-checker]').val();
                if(cheker == 3){
                    doublechartdatewise(dd,mm,yy,cheker)
                }if(cheker == 1){
                    singlechartdatewise(dd,mm,yy,cheker)}
                if(cheker == 2){
                    singlechartdatewise2(dd,mm,yy,cheker)}
        });
        function singlechartdatewise(dd,mm,yy,cheker){
                    function requestcalchartData(response,point) {
                            $.ajax({
                                    type:'POST',
                                    data:{drop:cheker,dd:dd,mm:mm,yy:yy},
                                    url: '<?php echo CController::createUrl("UserWorkouts/Caldateburntdata") ?>',
                                    success: function (response,point) {
                                           var dataArray = $.parseJSON(response);
                                           var totalcals =[];
                                           var date = [];
                                           totalcals['0'] = dataArray;

                                          // var oneArray = dataArray.splice(0,14);
                                            var twoArray = response;
                                            if(response){
                                            date['0'] =  dd+'-'+mm+'-'+yy;
                                            var series = chart.series[0];
                                            //chart.series[1].setData(eval(oneArray),false,true);
                                            chart.setTitle({text:"Calories Burnt"},false,true);
                                            chart.series[0].setData(eval(totalcals),false,true);
                                            chart.xAxis[0].setCategories(date,true,true);
                                        }
                    //                       chart.xAxis[0].setCategories(ay, true,true);
                    //                       chart.xAxis[0].setData(eval(ay),true,false);
                                            //chart.series[0].addPoint(response); // add the point
                                            //setTimeout(requestData, 5000);    // call it again after one second
                                              },
                                       cache: false
                                });}
                     var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "column",
                           events: {
                               load: requestcalchartData   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: ""
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
                    }
         function singlechartdatewise2(dd,mm,yy,cheker){
                    function requestcalchartData(response,point) {
                            $.ajax({
                                    type:'POST',
                                    data:{drop:cheker,dd:dd,mm:mm,yy:yy},
                                    url: '<?php echo CController::createUrl("UserWorkouts/Caldateburntdata") ?>',
                                    success: function (response,point) {
                                           var dataArray = $.parseJSON(response);
                                           var totalcals =[];
                                           var date = [];
                                           totalcals['0'] = dataArray;

                                          // var oneArray = dataArray.splice(0,14);
                                            var twoArray = response;
                                            if(response){
                                            date['0'] =  dd+'-'+mm+'-'+yy;
                                            var series = chart.series[0];
                                            //chart.series[1].setData(eval(oneArray),false,true);
                                            chart.setTitle({text:"Calories Intake"},false,true);
//                                            chart.series[0].setName("Calories Intake",false,true);
                                            chart.series[0].setData(eval(totalcals),false,true);
                                            chart.xAxis[0].setCategories(date,true,true);
                                        }
                    //                       chart.xAxis[0].setCategories(ay, true,true);
                    //                       chart.xAxis[0].setData(eval(ay),true,false);
                                            //chart.series[0].addPoint(response); // add the point
                                            //setTimeout(requestData, 5000);    // call it again after one second
                                              },
                                       cache: false
                                });}
                     var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "column",
                           events: {
                               load: requestcalchartData   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: ""
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
                    }
        function doublechartdatewise(dd,mm,yy,cheker){
            
            function requestcalchartData(response,point) {
                
                $.ajax({
                        type:'POST',
                        data:{drop:cheker,dd:dd,mm:mm,yy:yy},
                        url: '<?php echo CController::createUrl("UserWorkouts/Caldateburntdata") ?>',
                       success: function (response,point) {
                        var datas = $.parseJSON(response);
                        var oneArray = datas.splice(0,1);
                        var twoArray = datas;
                        var ay = [];
                        ay[0] = 'Burned';
                        ay[1] = 'Consumed';
                        var series = chart.series[0];
                        chart.series[1].setData(eval(oneArray),false, true);
                        chart.series[0].setData(eval(twoArray),true, true);
//                        chart.xAxis[0].setCategories(ay,true,true);
                        
                        //chart.series[0].addPoint(response); // add the point
//                        setTimeout(requestData, 5000);    // call it again after one second
                          },
                           cache: false
                    });}
                      var chart;
                       chart = new Highcharts.Chart({
                       chart: {
                           renderTo: "progresschart",
                           type: "column",
                           events: {
                               load: requestcalchartData   
                           }
                       },
                       credits: {
                               enabled: false
                           },
                       title: {
                           text: "Calories Burnt Vs Calories Consumed"
                       },
                        xAxis: {
                            
                               categories:["Calories"],
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
                           name: "Burnt",
                            data:[] 
                       }],
                       exporting: {
                                    enabled: false
                                }
                  });
                    }
})

</script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>