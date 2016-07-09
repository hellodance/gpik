<?php
/* @var $this FitnessCenterController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fitness Centers',
);

$this->menu=array(
	array('label'=>'Create FitnessCenter','url'=>array('create')),
	array('label'=>'Manage FitnessCenter','url'=>array('admin')),
);
?>

<h1>Fitness Centers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>