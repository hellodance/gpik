<?php
/* @var $this TrainerDetailsController */
/* @var $data TrainerDetails */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home')); ?>:</b>
	<?php echo CHtml::encode($data->home); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pincode')); ?>:</b>
	<?php echo CHtml::encode($data->pincode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homephone')); ?>:</b>
	<?php echo CHtml::encode($data->homephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pr_exp')); ?>:</b>
	<?php echo CHtml::encode($data->pr_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sec_exp')); ?>:</b>
	<?php echo CHtml::encode($data->sec_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exp_details')); ?>:</b>
	<?php echo CHtml::encode($data->exp_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_details')); ?>:</b>
	<?php echo CHtml::encode($data->emp_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fees')); ?>:</b>
	<?php echo CHtml::encode($data->fees); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certification')); ?>:</b>
	<?php echo CHtml::encode($data->certification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grp_active')); ?>:</b>
	<?php echo CHtml::encode($data->grp_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fb_link')); ?>:</b>
	<?php echo CHtml::encode($data->fb_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log')); ?>:</b>
	<?php echo CHtml::encode($data->log); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avtar')); ?>:</b>
	<?php echo CHtml::encode($data->avtar); ?>
	<br />

	*/ ?>

</div>