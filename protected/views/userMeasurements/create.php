<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */
?>

<?php
$this->breadcrumbs=array(
	'User Measurements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserMeasurements', 'url'=>array('index')),
	array('label'=>'Manage UserMeasurements', 'url'=>array('admin')),
);
?>

<h1>Create UserMeasurements</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>