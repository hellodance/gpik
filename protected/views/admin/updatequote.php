<?php
/* @var $this GuideController */
/* @var $model Guide */
?>

<?php
$this->breadcrumbs=array(
	'Quote'=>array('index'),
	$model->quote=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
	array('label'=>'View Guide', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guide', 'url'=>array('admin')),
);
?>

    <h1>Update Guide <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_updatequoteform', array('model'=>$model)); ?>