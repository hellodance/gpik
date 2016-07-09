<h3>Workout Plans</h3>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = false;
if ($workouts) {
    foreach ($workouts as $key => $works) {
        ?>
        <div class="accordion-group">

            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $key; ?>">
                    <i class="icon-plus"></i><?php echo date('F Y - j l', strtotime($works->adddate)); ?></a> </div>
            <div id="collapse_<?php echo $key; ?>" class="accordion-body collapse">
                <div class="accordion-inner">


                    <?php
                    $url = $this->createUrl('Trainerdetails/toggle');
                    Yii::app()->clientScript->registerScript('initStatus', "$(document).on('change','#grid_cardio_workout .status',function() {
              el = $(this);
            $.ajax({
            url:'$url', 
                data:{status: el.val(), id: el.data('id')},
                 success: function(response) {
                 $.fn.yiiGridView.update('grid_cardio_workout');
                 
                 }
                })
            });", CClientScript::POS_READY);
                    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'bordered',
//                        'responsiveTable' => true,
                        'dataProvider' => UserWorkouts::model()->getLegalWorkouts($works->adddate, $works->user_id),
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
                                'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                'name' => 'distance',
                                'sortable' => false,
                                'editable' => array(
                                    'url' => $this->createUrl('UserWorkouts/Editdistance'),
                                    'placement' => 'right',
                                    'inputclass' => 'span6',
                                )), array(
                                'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                'name' => 'speed',
                                'sortable' => false,
                                'editable' => array(
                                    'url' => $this->createUrl('UserWorkouts/Editspeed'),
                                    'placement' => 'right',
                                    'inputclass' => 'span6',
                                )), array(
                                'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                'name' => 'incline',
                                'sortable' => false,
                                'editable' => array(
                                    'url' => $this->createUrl('UserWorkouts/Editincline'),
                                    'placement' => 'right',
                                    'inputclass' => 'span6',
                                )), array(
                                'class' => 'yiiwheels.widgets.editable.WhEditableColumn',
                                'name' => 'level',
                                'sortable' => false,
                                'footer' => '<b>Total: </b>',
                                'editable' => array(
                                    'url' => $this->createUrl('UserWorkouts/Editlevel'),
                                    'placement' => 'right',
                                    'inputclass' => 'span6',
                                )),
                            array('header' => 'Calories',
                                'name' => 'calories',
                                'sortable' => false,
                                'footer' => UserWorkouts::model()->getlegaltotalcalories($works->adddate, $works->user_id),
                            ),
                            array('header' => 'Duration',
                                'name' => 'duration',
                                'sortable' => false,
                                'footer' => UserWorkouts::model()->getlegaltotalduration($works->adddate, $works->user_id),
                            ),
                            array(
                                'header' => '',
                                'class' => 'CButtonColumn',
                                'afterDelete' => 'function(link,success,data){ if(success){ 
                                                    
                                                      }}',
                                'template' => '{delete}',
                                'buttons' => array('delete' =>
                                    array(
                                        'url' => 'Yii::app()->controller->createUrl("DeletelegalCardioworkout",array("id"=>$data->primaryKey))',
                                        'label' => 'X',
                                        'imageUrl' => '',
                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
//                                            'confirm' => 'are you sure?',
                                            'class' => 'delete',
                                        ),
//                                                        'visible'=>'$data->status=="0"',
                                    ),
//                                    'update' => array(
//                                        'options' => array('class' =>"grid_cardio_workout' . $key . '"),
//                                    ),
                                ),
                                'htmlOptions' => array('width' => '6%')
                            ),
                        ),
                    ));
                    ?>




        <?php
        $url2 = $this->createUrl('TrainerDetails/toggle');
        Yii::app()->clientScript->registerScript('initStatusweight', "$(document).on('change','#grid_weight_workout .status',function() {
              el = $(this);
            $.ajax({
            url:'$url2', 
                data:{status: el.val(), id: el.data('id')},
                 success: function(response) {
                
                 $.fn.yiiGridView.update('grid_weight_workout');
                 }
                })
            });", CClientScript::POS_READY);

        $this->widget('yiiwheels.widgets.grid.WhGridView', array(
            'type' => 'bordered',
            'htmlOptions' => array('id' => 'grid_weight_workout' . $key, 'class' => 'table table-bordered table-row'),
            'dataProvider' => UserWorkouts::model()->getLegalweightWorkouts($works->adddate, $works->user_id),
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
                array(
                    'header' => '',
                    'class' => 'CButtonColumn',
                    'afterDelete' => 'function(link,success,data){ if(success){ 
                                                      }}',
                    'template' => '{delete}',
                    'buttons' => array('delete' =>
                        array(
                            'url' => 'Yii::app()->controller->createUrl("DeletelegalCardioworkout",array("id"=>$data->primaryKey))',
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
                ),
            ),
        ));
        ?>


                </div>
            </div>
        </div>
                <?php }
            } else { ?>
    <legend> No Workout found for today or for future.Please add some workout from Add Workout link. </legend><?php } ?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/fcd/fullcalendar.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.session.js"></script>