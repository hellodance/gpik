<?php
/* @var $this UserWorkoutsController */
/* @var $model UserWorkouts */

$this->breadcrumbs=array(
	'User Workouts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserWorkouts', 'url'=>array('index')),
	array('label'=>'Create UserWorkouts', 'url'=>array('create')),
	array('label'=>'Update UserWorkouts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserWorkouts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserWorkouts', 'url'=>array('admin')),
);
?>

<h1>View UserWorkouts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'worktype_id',
		'workout_id',
		'name',
		'time',
		'duration',
		'distance',
		'adddate',
		'speed',
		'incline',
		'level',
		'calories',
		'set1',
		'set2',
		'set3',
		'set4',
		'set5',
		'set6',
		'intake_note',
		'workout_note',
		'status',
	),
)); ?>
