<?php
/* @var $this GuideController */
/* @var $model Guide */
?>

<?php
$this->breadcrumbs=array(
	'Guides'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
	array('label'=>'Update Guide', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Guide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guide', 'url'=>array('admin')),
);
?>

<h1>View Guide #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
		'article',
		'thumb',
		'author',
		'date',
		'rating',
		'status',
	),
)); ?>