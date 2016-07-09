<style>
    #UserDetails_gender{width: 100%;}
</style>
<?php
/* @var $this AdminController */
/* @var $model UserDetails */
?>
<div class="row-fluid mrg1">
    <div class="span12">
<h1>Manage Users</h1>
<p>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $gender = array('1'=>'Male','0'=>'Female');?>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'type' => 'striped bordered',
        'responsiveTable' => true,
	'id'=>'guide-grid',
	'dataProvider'=>$model->search(),
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
		'mobile_no',
                array(
                            'header'=>'Avtar',
                            'class' => 'yiiwheels.widgets.grid.WhImageColumn',
                            'imagePathExpression'=>'"../avtar/". $data->avtar',
                            'imageOptions'=>array('width'=>'75'),
                            'htmlOptions' => array('class' => 'imgprev')),
		array('header'=>'Gender',
                    'name'=>'gender',
                    'filter' => $gender,
                    'sortable'=>FALSE,
                     'value'=>array($this,'getGenders'),
//                    'value'=> '$data->gender == 1 ? "Male" : "Female"',
                    'htmlOptions' => array('style'=>'max-width: 55px;'),
                    'filterHtmlOptions'=>array('style'=>'max-width: 55px;'),


                    ),
		/*
		'rating',
		'status',
		*/
		array(
                                                'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                                                'toggleAction'=>'admin/usertoggle', // contoller/action
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
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Deleteuser",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
//                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-trash',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Updateuser",array("id"=>$data->user_id))',
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
</div>