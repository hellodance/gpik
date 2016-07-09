<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */
?>

<?php
$this->breadcrumbs=array(
	'Fitness Centers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FitnessCenter', 'url'=>array('index')),
	array('label'=>'Create FitnessCenter', 'url'=>array('create')),
	array('label'=>'Update FitnessCenter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FitnessCenter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FitnessCenter', 'url'=>array('admin')),
);
?>

<h1>View FitnessCenter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'type',
		'url',
		'address',
		'phone',
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
	),
)); ?>