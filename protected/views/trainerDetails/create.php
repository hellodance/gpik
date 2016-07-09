<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
?>

<?php
$this->breadcrumbs=array(
	'Trainer Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrainerDetails', 'url'=>array('index')),
	array('label'=>'Manage TrainerDetails', 'url'=>array('admin')),
);
?>

<h1>Create TrainerDetails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>