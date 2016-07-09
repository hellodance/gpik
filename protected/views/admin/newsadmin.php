<?php
/* @var $this NewsController */
/* @var $model News */


$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
);


?>

<h1>Manage News</h1><?php
echo TbHtml::linkButton('Add More', array(
    // in this case htmlOptions won't work
    'rel'=>'tooltip','url'=> Yii::app()->createUrl('Admin/Createnews'),
    'title'=>'Add new News','block' => false, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE
   
));?>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>



<?php  $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'responsiveTable' => true,
                        
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'heading',
//		'article',
//		'status',
		array(
                                                'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                                                'toggleAction'=>'admin/newstoggle', // contoller/action
                                                'checkedButtonLabel'=>'Active',
                                                'uncheckedButtonLabel'=>'Inactive',    
                                                'name' => 'status',
                                                
                                                ),
                                    array(
                                          'header' => 'Action',
                                               'class'=>'bootstrap.widgets.TbButtonColumn',
                                                 'template' => '{delete}{update}',
                                                'buttons' => array('delete' =>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Deletenews",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Updatenews",array("id"=>$data->primaryKey))',
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