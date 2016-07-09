<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */
?>

<?php
$this->breadcrumbs=array(
	'User Measurements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserMeasurements', 'url'=>array('index')),
	array('label'=>'Create UserMeasurements', 'url'=>array('create')),
	array('label'=>'Update UserMeasurements', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserMeasurements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserMeasurements', 'url'=>array('admin')),
);
?>

<h1>View UserMeasurements #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'user_id',
		'weight',
		'arms',
		'calves',
		'chest',
		'forearms',
		'hips',
		'neck',
		'thighs',
		'waist',
		'adddate',
		'mnotes',
		'status',
		'reserve',
	),
)); ?>