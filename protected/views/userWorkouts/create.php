<?php
/* @var $this UserWorkoutsController */
/* @var $model UserWorkouts */

$this->breadcrumbs=array(
	'User Workouts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserWorkouts', 'url'=>array('index')),
	array('label'=>'Manage UserWorkouts', 'url'=>array('admin')),
);
?>

<h1>Create UserWorkouts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>