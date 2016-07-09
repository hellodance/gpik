<?php
/* @var $this GpFaqController */
/* @var $model GpFaq */


$this->breadcrumbs=array(
	'Gp Faqs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GpFaq', 'url'=>array('index')),
	array('label'=>'Create GpFaq', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gp-faq-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gp Faqs</h1><?php
echo TbHtml::linkButton('Add More', array(
    // in this case htmlOptions won't work
    'rel'=>'tooltip','url'=> Yii::app()->createUrl('Admin/Createfaq'),
    'title'=>'Add new Faq','block' => false, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE
   
));?>
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
                        'type' => 'striped bordered',
                        'responsiveTable' => true,
                        
	'id'=>'gp-faq-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'question',
//		'answer',
                //array('header'=>'Status','value'=>'$data->status==1?Active:Inactive'),
		array(
                                                'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                                                'toggleAction'=>'admin/faqtoggle', // contoller/action
                                                'checkedButtonLabel'=>'Active',
                                                'uncheckedButtonLabel'=>'Inactive',    
                                                'name' => 'status',
                                                
                                                ),
                                    array(
                                          'header' => 'Action',
                                               'class'=>'bootstrap.widgets.TbButtonColumn',
                                                 'template' => '{delete}{update}',
                                                'buttons' => array('delete' =>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Deletefaq",array("id"=>$data->primaryKey))',
                                                        'label' => 'delete',
                                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons-halflings.png',
                                                        'options' => array(// this is the 'html' array but we specify the 'ajax' element
                                                            //'confirm' => 'are you sure?',
                                                            // 'class' =>'icon-remove-signs',
                                                            //'class' => 'grid_action_set1',
                                                            
                                                        ),
                                                    ),
                                                    'update'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/Updatefaq",array("id"=>$data->primaryKey))',
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