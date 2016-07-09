<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */
?>

<?php
$this->breadcrumbs=array(
	'User Measurements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserMeasurements', 'url'=>array('index')),
	array('label'=>'Create UserMeasurements', 'url'=>array('create')),
	array('label'=>'View UserMeasurements', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserMeasurements', 'url'=>array('admin')),
);
?>

    <h1>Update UserMeasurements <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>