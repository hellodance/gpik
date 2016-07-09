<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */


$this->breadcrumbs=array(
	'User Measurements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserMeasurements', 'url'=>array('index')),
	array('label'=>'Create UserMeasurements', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-measurements-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Measurements</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-measurements-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'weight',
		'arms',
		'calves',
		'chest',
		/*
		'forearms',
		'hips',
		'neck',
		'thighs',
		'waist',
		'adddate',
		'mnotes',
		'status',
		'reserve',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>