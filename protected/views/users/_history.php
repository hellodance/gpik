<?php 
            $caldate = new DateTime();
            $calcurdate = new DateTime();
            $caldate->add(DateInterval::createFromDateString('-30 days'));
            $caldated = $caldate->format('d/m/Y');
            $calcurdate= $calcurdate->format('d/m/Y');
?>

<div class="row-fluid">
    <div class="span3">
      <div class="input-append date _<?php echo $model->id?>" id="dp3" data-date="<?php echo $caldated ;?>" data-date-format="dd-mm-yyyy" >
        <label>From</label>
        <input class="span2" type="text" value="<?php echo $caldated ;?>" size="16" disabled="disabled">
        <?php 
        /*$this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker',
            array(
    'name' => 'datepickertest_'.$model->id,'value'=>$caldated,
                'format' => 'dd/MM/yyyy',
     'pluginOptions' => array('pickTime'=>false,'pickDate'=>false),'htmlOptions'=>array('class'=>'startdate_'.$model->id,'disabled'=>'disabled')
    
    
    ));*/
    ?>
        <span class="add-on"><i class="icon-th"></i></span> 
      </div>
    </div>
    <div class="span3">
      <div class="input-append date _<?php echo $model->id?>" id="dp3" data-date="08-11-2013" data-date-format="dd-mm-yyyy">
        <label>To</label>
        <input class="span2" type="text" value="<?php echo $calcurdate ;?>" size="16" disabled="disabled">
        <?php 
        /*$this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker',
            array(
                'name' => 'datepickertest_'.$model->id,'value'=>$calcurdate,
                'format' => 'dd/MM/yyyy',
                    'pluginOptions' => array('pickTime'=>false),'htmlOptions'=>array('class'=>'enddate_'.$model->id),
                    'events'=>array('changeDate'=>'js:function(e){
//                        console.log(e);
//                        var edate = $(".enddate_'.$model->id.'").val();
//                        var sdate = $(".startdate_'.$model->id.'").val();
//                                $.ajax({
//                                        url:"'.CController::createUrl("UserWorkouts/Rangeworkouts").'", 
//                                        data:{enddate:edate,startdate:sdate,id:'.$model->id.'},
//                                        type: "POST",
//                                        success: function(response) {
//                                        console.log(response)
//                                        }
//                    })
            }'),
    
    ));*/
    ?>
        <span class="add-on"><i class="icon-th"></i></span> 
      </div>
    </div>
  </div>
  <div class="row-fluid client-data height01 mrg1">
    <div class="span12">
      <div class="accordion" id="accordion3_<?php echo $model->id?>">
          <?php  $recordsets = UserWorkouts::model()->getRangeWorkouts('','', $model->id);
          if($recordsets){
          foreach ($recordsets as $keyw=>$record){
              
          ?>
        <div class="accordion-group" id='grp_<?php echo $record->id?>'>
          <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3_<?php echo $model->id?>" href="#collapseOneexe_<?php echo $model->id.'_'.$keyw; ?>"> <i class="icon-plus"></i><?php echo date('F Y - j l', strtotime($record->adddate));?></a> </div>
          <div id="collapseOneexe_<?php echo $model->id.'_'.$keyw; ?>" class="accordion-body collapse">
            <div class="accordion-inner">
              
                <?php    
               
                    $url = $this->createUrl('Trainerdetails/toggle');
                    Yii::app()->clientScript->registerScript('initStatus', "$(document).on('change','#grid_cardio_workout .status',function() {
              el = $(this);
            $.ajax({
            url:'$url', 
                data:{status: el.val(), id: el.data('id')},
                 success: function(response) {
                 $.fn.yiiGridView.update('grid_cardio_workout'$key);
                 
                 }
                })
            });", CClientScript::POS_READY);
                    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'bordered',
//                        'responsiveTable' => true,
                        'dataProvider' => UserWorkouts::model()->getcardioRangeWorkouts('',$record->adddate, $model->id),
                        'template' => "{items}",
                        'htmlOptions' => array('id' => 'grid_cardio_workout' . $key, 'class' => 'table table-bordered table-row'),
                        'afterAjaxUpdate' => 'js:function(id,data){ 
                                $.fn.yiiGridView.update("grid_cardio_workout' . $key . '");
                            }',
                        'columns' => array(
                            array('header' => 'Cardio',
                                'name' => 'name',
                                'sortable' => false,
                                'htmlOptions' => array('width' => '40%')
                            ),
                            array(
                                'name' => 'distance',
                                'sortable' => false,
                                'value'=>'$data->distance ? $data->distance :\'N/A\'',
                                ), array(
                                
                                'name' => 'speed',
                                'sortable' => false,
                                 'value'=>'$data->speed ? $data->speed :\'N/A\'',
                                ), array(
                                
                                'name' => 'incline',
                                'sortable' => false,
                                 'value'=>'$data->incline ? $data->incline :\'N/A\'',   
                                ), array(
                               
                                'name' => 'level',
                                'sortable' => false,
                                 'value'=>'$data->level ? $data->level :\'N/A\'',   
                                'footer' => '<b>Total: </b>',
                                ),
                            array('header' => 'Calories',
                                'name' => 'calories',
                                'sortable' => false,
                                'footer' => UserWorkouts::model()->getlegaltotalcalories($record->adddate, $record->user_id),
                            ),
                            array('header' => 'Duration',
                                'name' => 'duration',
                                'sortable' => false,
                                'footer' => UserWorkouts::model()->getlegaltotalduration($record->adddate, $record->user_id),
                            ),
                       /*     array(
                                'header' => '',
                                'class' => 'CButtonColumn',
                                'afterDelete' => 'function(link,success,data){ if(success){ 
                                                    
                                                      }}',
                                'template' => '{delete}',
                                'buttons' => array('delete' =>
                                    array(
                                        'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                                        'label' => 'X',
                                        'imageUrl' => '',
                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                            //'confirm' => 'are you sure?',
                                            'class' => 'delete',
                                        ),
//                                                        'visible'=>'$data->status=="0"',
                                    ),
                                    'update' => array(
                                        'options' => array('class' => 'grid_cardio_workout'),
                                    ),
                                ),
                                'htmlOptions' => array('width' => '6%')
                            ),*/
                        ),
                    ));
                    
                    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
            'type' => 'bordered',
            'htmlOptions' => array('id' => 'grid_weight_workout' . $key, 'class' => 'table table-bordered '),
            'dataProvider' => UserWorkouts::model()->getweightRangeWorkouts('',$record->adddate, $model->id),
            'template' => "{items}",
            'afterAjaxUpdate' => 'js:function(id,data){
                            $.fn.yiiGridView.update("grid_weight_workout' . $key . '");
                            }',
            'columns' => array(
                array('header' => 'Weight Training',
                    'name' => 'name',
                    'sortable' => false,
                ),
                array(
                    'name' => 'set1',
                    'value' => array($this, 'gridSet1Column'),
                    'sortable' => false, 'htmlOptions' => array('width' => '8%')
                ), array(
                    'name' => 'set2',
                    'value' => array($this, 'gridSet2Column'),
                    'sortable' => false,
                    'htmlOptions' => array('width' => '8%')
                ), array(
                    'name' => 'set3',
                    'value' => array($this, 'gridSet3Column'),
                    'sortable' => false,
//                                                    'footer'=>'<b>Duration: </b>',
                    'htmlOptions' => array('width' => '8%')
                ), array(
                    'name' => 'set4',
                    'value' => array($this, 'gridSet4Column'),
                    'sortable' => false,
//                                                    'footer'=>UserWorkouts::model()->getweighttotalduration(),
                    'htmlOptions' => array('width' => '8%', 'class' => 'gray-grd')
                ), array(
                    'name' => 'set5',
                    'value' => array($this, 'gridSet5Column'),
                    'sortable' => false,
//                                                    'footer'=>'<b>Calories: </b>',
                    'htmlOptions' => array('width' => '8%')
                ), array(
                    'name' => 'set6',
                    'value' => array($this, 'gridSet6Column'),
                    'sortable' => false,
//                                                    'footer'=>UserWorkouts::model()->getweighttotalcalories(),
                    'htmlOptions' => array('width' => '8%')
                ),
               /* array(
                    'header' => '',
                    'class' => 'CButtonColumn',
                    'afterDelete' => 'function(link,success,data){ if(success){ 
                                                      }}',
                    'template' => '{delete}',
                    'buttons' => array('delete' =>
                        array(
                            'url' => 'Yii::app()->controller->createUrl("DeleteCardioworkout",array("id"=>$data->primaryKey))',
                            'label' => 'X',
                            'imageUrl' => '',
                            'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                //'confirm' => 'are you sure?',
                                'class' => 'delete',
                            ),
//                                                        'visible'=>'$data->status=="0"',
                        ),
                        'update' => array(
                            'options' => array('class' => 'grid_weight_workout'),
                        ),
                    ),
                    'htmlOptions' => array('width' => '6%')
                ),*/
            ),
        ));
                    ?>
            </div>
          </div>
        </div>
          <?php }}else{?>
          <legend>No History</legend>
              <?php } ?>
        
        
        
        
        
      </div>
    </div>
  </div>
