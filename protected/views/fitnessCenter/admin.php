<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */


$this->breadcrumbs=array(
	'Fitness Centers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FitnessCenter', 'url'=>array('index')),
	array('label'=>'Create FitnessCenter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#fitness-center-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Fitness Centers</h1>

<p>
<?php echo TbHtml::linkbutton('Add New Center',array('url'=> Yii::app()->createUrl('FitnessCenter/Create'),'style' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_DEFAULT)); ?>
</p>

<?php 
$fitnesstype = array(1=>'Gym/Fitness club',2=>'Aerobics classes',3=>'Yoga Centre',4=>'Martial arts',5=>'Dance Academy',6=>'Sports club',7=>'Other');
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'responsiveTable' => true,
	'id'=>'fitness-center-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
        array('name'=>'name', 'header'=>'Name' , 'type'=>'raw','filter'=>false,'sortable'=>false,),
        array('name'=>'type', 'header'=>'Type' , 'type'=>'raw','filter'=>false,'sortable'=>false,),
//		array('name'=>'type','value'=>array($this,'type'),'sortable'=>false,'filter'=> $fitnesstype),
//		'url',
        array(
            'header'=>Locality::model()->getAttributeLabel('Area'), //column header
            'value'=>'$data->getRelated("area")->locality', //column name, php expression
            'type'=>'raw',
        ),
        array('name'=>'phone', 'header'=>'Phone Number' , 'type'=>'raw','filter'=>false,'sortable'=>false,),
                array(
                                                'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                                                'toggleAction'=>'fitnessCenter/toggle', // contoller/action
                                                'checkedButtonLabel'=>'Active',
                                                'uncheckedButtonLabel'=>'Inactive',    
                                                'name' => 'status',
                                                'filter'=>false,'sortable'=>false,
                                                ),
		/*
		'area',
		'speciality',
		'total_trainers',
		'gender',
		'timings',
		'facilities',
		'mem_fee',
		'reg_fee',
		'pay_method',
		'adddate',
		'status',
		*/
		array(
                                          'header' => 'Action',
                                               'class'=>'bootstrap.widgets.TbButtonColumn',
                                                 'template' => '{delete}{update}',
                                                'buttons' => array('delete' =>array(
                                                        'url' => 'Yii::app()->controller->createUrl("fitnessCenter/Delete",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
//                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("fitnessCenter/Update",array("id"=>$data->primaryKey))',
                                                        'label' => 'update',
                                                        //'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                  
                                                ),

                                                
                                            ),
	),
)); ?>