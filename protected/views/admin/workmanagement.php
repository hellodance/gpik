<?php 
$this->widget('bootstrap.widgets.TbModal', array(
    'id' =>'myModal',
    'header' =>'Work Type',
    'onHide'=>'function(){ $("#worktype-form")[0].reset(); }',
    'content' =>$this->renderPartial('_worktypeform', array('model'=>$wktypemodel),true),
    'footer' => array(
                      TbHtml::button('Save', array('data-dismiss' => 'modal','color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)),
                      TbHtml::button('Close', array('data-dismiss' => 'modal','color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)),
                     ),
    )); ?>
     
    <?php echo TbHtml::button('Add Work Type', array(
                'style' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModalitem',
    'header' => 'Modal Heading',
    'content' =>  $this->renderPartial('_workoutform', array('model'=>$model),true),
   
    )); ?>
     
    <?php echo TbHtml::button('Add Workouts', array(
                'style' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                'data-toggle' => 'modal',
                'data-target' => '#myModalitem',
    )); ?>
    <?php echo TbHtml::linkbutton('Work Type Management',array('url'=> Yii::app()->createUrl('Admin/Worktypeadmin'),'style' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>


<div>
<?php
/* @var $this GuideController */
/* @var $model Guide */
$this->breadcrumbs=array(
	'Guides'=>array('index'),
	'Manage',
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
<h1>Manage Work Management</h1>
<p>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'type' => 'striped bordered',
        'responsiveTable' => true,
	'id'=>'guide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'id','value'=>'$data->id'),
		array('header'=>'Worktype','name'=>'worktype_id','filter'=> CHtml::listData(Worktype::model()->findAll(),'id','name'),'value'=>'$data->worktype->name'),
		'name',
		'intensity',
		array(
                        'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                        'toggleAction'=>'admin/worktoggle', // contoller/action
                        'checkedButtonLabel'=>'Active',
                        'uncheckedButtonLabel'=>'Inactive',    
                        'name' => 'status',

                        ),
                array(
                      'header' => 'Action',
                           'class'=>'bootstrap.widgets.TbButtonColumn',
                           'template' => '{delete}{update}',
                           'buttons' => array('delete' =>array(
                                    'url' => 'Yii::app()->controller->createUrl("admin/Deleteworkouts",array("id"=>$data->primaryKey))',
                                    'label' => 'delete',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                    'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                        //'confirm' => 'are you sure?',
                                        // 'class' =>'icon-remove-signs',
                                        //'class' => 'grid_action_set1',

                                    ),
                                ),
                                'update'=>array(
                                    'url' => 'Yii::app()->controller->createUrl("admin/Updateworkouts",array("id"=>$data->primaryKey))',
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