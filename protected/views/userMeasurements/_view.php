<?php
/* @var $this UserMeasurementsController */
/* @var $data UserMeasurements */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arms')); ?>:</b>
	<?php echo CHtml::encode($data->arms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calves')); ?>:</b>
	<?php echo CHtml::encode($data->calves); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chest')); ?>:</b>
	<?php echo CHtml::encode($data->chest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forearms')); ?>:</b>
	<?php echo CHtml::encode($data->forearms); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hips')); ?>:</b>
	<?php echo CHtml::encode($data->hips); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('neck')); ?>:</b>
	<?php echo CHtml::encode($data->neck); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thighs')); ?>:</b>
	<?php echo CHtml::encode($data->thighs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waist')); ?>:</b>
	<?php echo CHtml::encode($data->waist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adddate')); ?>:</b>
	<?php echo CHtml::encode($data->adddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mnotes')); ?>:</b>
	<?php echo CHtml::encode($data->mnotes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reserve')); ?>:</b>
	<?php echo CHtml::encode($data->reserve); ?>
	<br />

	*/ ?>

</div>