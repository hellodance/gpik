<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'edit-food',
'header' => '<h3>Edit Food Intake</h3>',
'content'=> $this->renderPartial('_editfood',array('food'=>$food),true),//'adasdasdasd',//
//'remote' => $this->renderPartial('_form',array('model'=>$model),true),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>true,
    'onHidden'=>'function(){ 
                       window.location = "'.CController::createUrl("users/userdashboard#calories").'";
                        }',
 'footer'=>'',
//    'closeText'=>false,
//    'backdrop'=>false,
    'keyboard'=>TRUE,
    
     'htmlOptions'=>array('class'=>'modal hide fade workout-modal calories',
//         'style'=>'z-index:9999'
         ),
'footer' => array(

TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),
TbHtml::submitButton('Update', array('id'=>'foodedit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
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
//                                                'footer'=>'<b>Total: </b>',
                                            'editable' => array(
                                            'url' => $this->createUrl('UserWorkouts/Editlevel'),
                                            'placement' => 'right',
                                            'inputclass' => 'span6',
                                            )),
                                            array('header'=>'Calories',
                                                        'name'=>'calories',
                                                             'sortable'=>false,
//                                                        'footer'=>UserWorkouts::model()->gettotalcalories(),
                                                        ),
                                                        array('header'=>'Duration',
                                                        'name'=>'duration',
                                                             'sortable'=>false,
//                                                        'footer'=>UserWorkouts::model()->gettotalduration(),
                                                        ),
                                             array(
                                                'header' => '',
                                                'class' => 'CButtonColumn',
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
                                                        'label' => 'X',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'delete',
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
                            <td width="111px" id="totalcals" style="border-left: none;border-right: none"><?php echo UserWorkouts::model()->gettotalcalories(); ?></td>
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
                                                'header' => '',
                                                'class' => 'CButtonColumn',
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
                                                        'label' => 'X',
                                                        'imageUrl'=>'',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                             'class' =>'delete',
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
                            <td width="111px" id="totalcals" style="border-left: none;border-right: none"><?php echo UserWorkouts::model()->getweighttotalcalories(); ?></td>
                            <td width="54px" style="border-left: none;border-right: none"> </td>
                            <td width="0%" style="border-left: none;border-right: none"> </td>
                            <td width="76px" style="border-left: none;">  </td>
                        </tr>
                    </table>
            </div>
            </div>
        </div>
        <!---Exercise Journal Ends----->
        
        
     
  </div>
      </div>
    </div>
  </div>
    </div>


<script>
    $(document).ready(function(){
        $('#add-workout').on('shown', function() {
        $("#workout-form")[0].reset();
        $("#updateentry").attr("disabled", "disabled");
        $("#workedit").attr("disabled", "disabled");
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
        $('#workouts').html('');
        $('#work_id').val('');
        
    });
    $(document).on('click','#workedit',function(){
        $("#updateentry").click();
    });
    $(document).on('click','#foodedit',function(){
        $("#updatefoodentry").click();
    });
        var measuredate = $('.measuredates').val();
        $('#mnote').val(measuredate);
        $('li.weight').css('display','none');
        $('li.distance').css('display','none');
    /**Dynamic enble / disable the Add entry button of workout popup to stop garbage input*/
        $("#search-services").bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#updateentry").attr("disabled", "disabled");
            $("#workedit").attr("disabled", "disabled");
        } else {
            $("#updateentry").removeAttr("disabled", "disabled");
            $("#workedit").removeAttr("disabled", "disabled");
        }   
    });
    /**Dynamic enble / disable the Add entry button of food popup to stop garbage input*/
    $("#search-fooditems").bind("change paste keyup", function(event) {
        X = event.target.value;
        if (X == 0) {
            $("#addfoodentry").attr("disabled", "disabled");
            $("#updatefoodentry").attr("disabled", "disabled");
            $("#foodedit").attr("disabled", "disabled");
        } else {
             
            $("#addfoodentry").removeAttr("disabled", "disabled");
            $("#updatefoodentry").removeAttr("disabled", "disabled");
            $("#foodedit").removeAttr("disabled", "disabled");
        }   
    });
        /**Adding a workout via dynamic list generated**/
        $(document).on('click','a.workitem',function(){
           var itemname = $(this).html();
           var id =$(this).attr('typeid');
           var worktype = $(this).attr('worktype');
           var exerciseid =$(this).attr('exercise');
           $('#search-services').val(itemname);
            $("#updateentry").removeAttr("disabled", "disabled");
            $("#workedit").removeAttr("disabled", "disabled");
           $('#hiddenworkid1').val(id);
           $('#exerciseid1').val(exerciseid);
           if(worktype==1){
               $('li.distance').css('display','none');
               $('li.weight').css('display','block');
               $('#exercisetype1').val('1');
              $('li.duration *').attr('disabled', true)
           }
           else{
               $('li.distance').css('display','block');
                $('li.weight').css('display','none');
                $('li.duration *').attr('disabled', false);
                $('#exercisetype1').val('');
           }
        });
    /**Adding a food item via list items*/
        $(document).on('click','a.fooditem',function(){
           var itemname = $(this).html();
           var id =$(this).attr('foodtypeid');
            var foodid =$(this).attr('food');
           $('#search-fooditems').val(itemname);
            $("#addfoodentry").removeAttr("disabled", "disabled");
             $("#updatefoodentry").removeAttr("disabled", "disabled");
           $('#hiddenfoodtypeid').val(id);
           $('#foodid').val(foodid);
           
        });
   
    
})
</script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.validate.js"></script>