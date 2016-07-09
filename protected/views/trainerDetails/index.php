<?php
/* @var $this TrainerDetailsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Trainer Details',
);

$this->menu=array(
	array('label'=>'Create TrainerDetails','url'=>array('create')),
	array('label'=>'Manage TrainerDetails','url'=>array('admin')),
);
?>

<h1>Trainer Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>