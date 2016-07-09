<?php
/* @var $this GpFaqController */
/* @var $model GpFaq */
?>

<?php
$this->breadcrumbs=array(
	'Gp Faqs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GpFaq', 'url'=>array('index')),
	array('label'=>'Create GpFaq', 'url'=>array('create')),
	array('label'=>'View GpFaq', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GpFaq', 'url'=>array('admin')),
);
?>

    <h1>Update Faq <?php //echo $model->id; ?></h1>

<?php $this->renderPartial('_faqform', array('model'=>$model)); ?>