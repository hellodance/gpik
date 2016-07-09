<?php
/* @var $model TrainerDetails */
?>

<?php 
$this->breadcrumbs=array(
	'Trainer'=>array('index'),
	$model->fname=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
	array('label'=>'View Guide', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guide', 'url'=>array('admin')),
);
?>

    <h1>Update Trainer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_admintrainerform',array('model'=>$model)); ?>