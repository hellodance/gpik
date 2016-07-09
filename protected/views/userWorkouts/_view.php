<?php
/* @var $this UserWorkoutsController */
/* @var $data UserWorkouts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('worktype_id')); ?>:</b>
	<?php echo CHtml::encode($data->worktype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workout_id')); ?>:</b>
	<?php echo CHtml::encode($data->workout_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('distance')); ?>:</b>
	<?php echo CHtml::encode($data->distance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adddate')); ?>:</b>
	<?php echo CHtml::encode($data->adddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speed')); ?>:</b>
	<?php echo CHtml::encode($data->speed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incline')); ?>:</b>
	<?php echo CHtml::encode($data->incline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calories')); ?>:</b>
	<?php echo CHtml::encode($data->calories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set1')); ?>:</b>
	<?php echo CHtml::encode($data->set1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set2')); ?>:</b>
	<?php echo CHtml::encode($data->set2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set3')); ?>:</b>
	<?php echo CHtml::encode($data->set3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set4')); ?>:</b>
	<?php echo CHtml::encode($data->set4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set5')); ?>:</b>
	<?php echo CHtml::encode($data->set5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('set6')); ?>:</b>
	<?php echo CHtml::encode($data->set6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intake_note')); ?>:</b>
	<?php echo CHtml::encode($data->intake_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workout_note')); ?>:</b>
	<?php echo CHtml::encode($data->workout_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>