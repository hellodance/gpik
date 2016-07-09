<?php
/* @var $this GuideController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Guides',
);

$this->menu=array(
	array('label'=>'Create Guide','url'=>array('create')),
	array('label'=>'Manage Guide','url'=>array('admin')),
);
?>

<h1>Guides</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>