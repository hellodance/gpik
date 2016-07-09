<?php
/* @var $model UserDetails */
?>

<?php 
$this->breadcrumbs=array(
	'User'=>array('index'),
	$userdetail->fname=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
	array('label'=>'View Guide', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guide', 'url'=>array('admin')),
);
?>

    <h1>Update User <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_adminuserform',array('model'=>$model)); ?>