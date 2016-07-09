<?php
/* @var $this FitnessCenterController */
/* @var $data FitnessCenter */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('speciality')); ?>:</b>
	<?php echo CHtml::encode($data->speciality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_trainers')); ?>:</b>
	<?php echo CHtml::encode($data->total_trainers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timings')); ?>:</b>
	<?php echo CHtml::encode($data->timings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilities')); ?>:</b>
	<?php echo CHtml::encode($data->facilities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mem_fee')); ?>:</b>
	<?php echo CHtml::encode($data->mem_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_fee')); ?>:</b>
	<?php echo CHtml::encode($data->reg_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_method')); ?>:</b>
	<?php echo CHtml::encode($data->pay_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adddate')); ?>:</b>
	<?php echo CHtml::encode($data->adddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>