<?php
/* @var $this UserWorkoutsController */
/* @var $model UserWorkouts */

$this->breadcrumbs=array(
	'User Workouts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserWorkouts', 'url'=>array('index')),
	array('label'=>'Create UserWorkouts', 'url'=>array('create')),
	array('label'=>'View UserWorkouts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserWorkouts', 'url'=>array('admin')),
);
?>

<h1>Update UserWorkouts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>