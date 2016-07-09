<?php
/* @var $this GuideController */
/* @var $model Guide */
?>

<?php
$this->breadcrumbs=array(
	'Guides'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
	array('label'=>'View Guide', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guide', 'url'=>array('admin')),
);
?>

    <h1>Add Food Type<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_foodtypeform', array('model'=>$model)); ?>