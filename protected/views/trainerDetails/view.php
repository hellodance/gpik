<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
?>

<?php
$this->breadcrumbs=array(
	'Trainer Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrainerDetails', 'url'=>array('index')),
	array('label'=>'Create TrainerDetails', 'url'=>array('create')),
	array('label'=>'Update TrainerDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TrainerDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrainerDetails', 'url'=>array('admin')),
);
?>

<h1>View TrainerDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'user_id',
		'fname',
		'lname',
		'mobile',
		'address',
		'home',
		'street',
		'city_id',
		'area',
		'pincode',
		'country_id',
		'homephone',
		'dob',
		'gender',
		'pr_exp',
		'sec_exp',
		'exp_details',
		'emp_details',
		'fees',
		'certification',
		'grp_active',
		'fb_link',
		'status',
		'log',
		'avtar',
	),
)); ?>