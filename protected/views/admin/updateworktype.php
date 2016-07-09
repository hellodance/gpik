<?php
/* @var $this NewsController */
/* @var $model News */
?>

<?php
$this->breadcrumbs=array(
	'worktype'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

    <h1>Update Food Item </h1>

<?php $this->renderPartial('_updateworktypeform', array('model'=>$model)); ?>