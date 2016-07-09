<?php
/* @var $this UserWorkoutsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Workouts',
);

$this->menu=array(
	array('label'=>'Create UserWorkouts', 'url'=>array('create')),
	array('label'=>'Manage UserWorkouts', 'url'=>array('admin')),
);
?>

<h1>User Workouts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
