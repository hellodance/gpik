<!--<div class="form">-->
<div class="loader" style="display: none;position: absolute;top: 50%;left: 50%;z-index: 999999;"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/ajaxloader.gif" ></div>

<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'first-reg',
'header' => '<h3>Edit Profile</h3>',
'content'=> $this->renderPartial('profile_form1',array('model'=>$model,'details'=>$details),true),//'adasdasdasd',//
//'remote' => $this->renderPartial('_form',array('model'=>$model),true),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>true,
    'onHidden'=>'function(){ 
                       window.location = "'.CController::createUrl("users/userdashboard").'";
                        }',
 'footer'=>'',
//    'closeText'=>false,
//    'backdrop'=>false,
    'keyboard'=>true,
    
     'htmlOptions'=>array('class'=>'user-modal',
//         'style'=>'z-index:9999'
         ),
'footer' => array(

TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),
TbHtml::submitButton('Submit', array('id'=>'profilesubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
)); ?>
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
                   	  <select name="">
                            <option>Calories Burnt</option>
                            <option>Calories Intake</option>
                            <option>Calories Burnt vs calories intake</option>
                            <option>Measurements</option>
                            
                        </select>
                    </div>
                    <div class="select-area text-right">
                        <div id="datepickers"></div>
               	    <!--<img src="<?php echo  Yii::app()->request->baseUrl ; ?>/images/calendar.gif" alt="" /> </div>-->
                </div>
            </div>
        </div>
      </div>
           </div>
       <!---End Of Progress Tab---->
       
      
     
     
  
      </div>
    </div>
  </div>
    </div>

</div>
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
//               console.log($('#medical-form').parents().find('#tab2'));
//                $('#medical-form').parents().find('#tab2').addClass('active in');
//                $('#medical-form').parents().find('#tab1').removeClass('active in');
//                 $('#medical-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
//                   
//                    }else if(obj =='file' ){
//                $('#medical-form').parents().find('#tab2').addClass('active in');
//                $('#medical-form').parents().find('#tab1').removeClass('active in');
//                 $('#medical-form').parents().find('li.active').removeClass('active').next('li').addClass('active');
//                }else{
//                  $('#medical-form').parents().find('h3').next().html('<div class="alert alert-error in alert-block fade">Fill the form correctly.</div>');
//                //alert(obj.UserDetails_qid);
//                }
//                if(obj.UserDetails_qid == 'success'){
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

