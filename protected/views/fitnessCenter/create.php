<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */
?>

<?php
$this->breadcrumbs=array(
	'Fitness Centers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FitnessCenter', 'url'=>array('index')),
	array('label'=>'Manage FitnessCenter', 'url'=>array('admin')),
);
?>

<h1>Create FitnessCenter</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>