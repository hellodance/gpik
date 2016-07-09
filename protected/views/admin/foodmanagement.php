<?php 
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Food Type',
    'content' =>  $this->renderPartial('_foodtypeform', array('model'=>$fdtypemodel),true),
    'footer' => array(
                      TbHtml::button('Save', array('data-dismiss' => 'modal','color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)),
                      TbHtml::button('Close', array('data-dismiss' => 'modal','color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)),
                     ),
    )); ?>
     
    <?php echo TbHtml::button('Add Food Type', array(
                'style' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModalitem',
    'header' => 'Modal Heading',
    'content' =>  $this->renderPartial('_fooditemform', array('model'=>$model),true),
   
    )); ?>
     
    <?php echo TbHtml::button('Add Food Items', array(
                'style' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                'data-toggle' => 'modal',
                'data-target' => '#myModalitem',
    )); ?>
    <?php echo TbHtml::linkbutton('Food Type Management',array('url'=> Yii::app()->createUrl('Admin/Foodtypeadmin'),'style' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>


<div>
<?php
/* @var $this GuideController */
/* @var $model Guide */
$this->breadcrumbs=array(
	'Guides'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search',"
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#guide-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Food Management</h1>
<p>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'type' => 'striped bordered',
        'responsiveTable' => true,
	'id'=>'guide-grid',
	'dataProvider'=>$model->foodtypesearch(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'id','value'=>'$data->id'),
		array('header'=>'Foodtype','name'=>'food_typeid','filter'=> CHtml::listData(Foodtype::model()->findAll(),'id','name'),'value'=>'$data->fdtype->name'),
		'item',
		'calories',
		array(
                        'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                        'toggleAction'=>'admin/foodtoggle', // contoller/action
                        'checkedButtonLabel'=>'Active',
                        'uncheckedButtonLabel'=>'Inactive',    
                        'name' => 'status',

                        ),
                array(
                      'header' => 'Action',
                           'class'=>'bootstrap.widgets.TbButtonColumn',
                           'template' => '{delete}{update}',
                           'buttons' => array('delete' =>array(
                                    'url' => 'Yii::app()->controller->createUrl("admin/Deletefooditems",array("id"=>$data->primaryKey))',
                                    'label' => 'delete',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                    'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                        //'confirm' => 'are you sure?',
                                        // 'class' =>'icon-remove-signs',
                                        //'class' => 'grid_action_set1',

                                    ),
                                ),
                                'update'=>array(
                                    'url' => 'Yii::app()->controller->createUrl("admin/Updatefooditem",array("id"=>$data->primaryKey))',
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