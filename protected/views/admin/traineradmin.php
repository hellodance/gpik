<style>
    #TrainerDetails_gender{width: 55px;}
</style>
<div>
<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
?>
<h1>Manage Trainer</h1>
<p>
<?php echo TbHtml::linkbutton('Add New Professional',array('url'=> Yii::app()->createUrl('FitnessCenter/TrainersCreate'),'style' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_DEFAULT)); ?>
</p>
<?php $gender = array('1'=>'Male','0'=>'Female');?>
<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'type' => 'bordered',
        'responsiveTable' => true,
	'id'=>'guide-grid',
//        'template' => "{items}{summary}{pager}",
	'dataProvider'=>$model->Adminsearch(),
	'filter'=>$model,
	'columns'=>array(
		array(      
                    'header'=>'ID',
                    'name'=>'id',
                    'sortable'=>FALSE,
                    'filter'=>FALSE,
                             ),
                'fname',
		'lname',
		'mobile',
                array(
                            'header'=>'Avtar',
                            'class' => 'yiiwheels.widgets.grid.WhImageColumn',
                            'imagePathExpression'=>'"../avtar/". $data->avtar',
                            'imageOptions'=>array('width'=>'75'),
                            'htmlOptions' => array('class' => 'imgprev')),
//		'gender',
                array('header'=>'Gender',
                    'name'=>'gender',
                    'filter' => $gender,
                    'sortable'=>FALSE,
                    'value'=> '($data->gender == 1 ? "Male" : ($data->gender == 0 ? "Female" : "None"))',
                    'htmlOptions' => array('style'=>'max-width: 55px;'),
                    'filterHtmlOptions'=>array('style'=>'max-width: 55px;'),


                    ),
		/*
		'rating',
		'status',
		*/
		array(
                                                'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                                                'toggleAction'=>'admin/trainertoggle', // contoller/action
                                                'checkedButtonLabel'=>'Active',
                                                'uncheckedButtonLabel'=>'Inactive',    
                                                'name' => 'status',
                                                'sortable'=>FALSE,
                                                'filter'=>FALSE,
                                                ),
                                    array(
                                          'header' => 'Action',
                                               'class'=>'bootstrap.widgets.TbButtonColumn',
                                               'template' => '{delete}{update}',
                                               'buttons' => array('delete' =>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Deletetrainer",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
//                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-trash',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Updatetrainer",array("id"=>$data->primaryKey))',
                                                        'label' => 'update',
                                                        //'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                  
                                                ),

                                                
                                            ),)
		
        )); ?>
</div>