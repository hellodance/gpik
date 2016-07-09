<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
?>

<?php
$this->breadcrumbs=array(
	'Trainer Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrainerDetails', 'url'=>array('index')),
	array('label'=>'Create TrainerDetails', 'url'=>array('create')),
	array('label'=>'View TrainerDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TrainerDetails', 'url'=>array('admin')),
);
?>

    <h1>Update TrainerDetails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>