<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */
?>

<?php
$this->breadcrumbs=array(
	'Fitness Centers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FitnessCenter', 'url'=>array('index')),
	array('label'=>'Create FitnessCenter', 'url'=>array('create')),
	array('label'=>'View FitnessCenter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FitnessCenter', 'url'=>array('admin')),
);
?>

    <h1>Update FitnessCenter <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>