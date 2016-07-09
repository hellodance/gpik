<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-details-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'fname',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'lname',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'mobile',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'address',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'home',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'street',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'city_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'area',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'pincode',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'country_id',array('span'=>5,'maxlength'=>11)); ?>

            <?php echo $form->textFieldControlGroup($model,'homephone',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'dob',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'gender',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'pr_exp',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'sec_exp',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'exp_details',array('span'=>5,'maxlength'=>500)); ?>

            <?php echo $form->textFieldControlGroup($model,'emp_details',array('span'=>5,'maxlength'=>300)); ?>

            <?php echo $form->textFieldControlGroup($model,'fees',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'certification',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'grp_active',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'fb_link',array('span'=>5,'maxlength'=>500)); ?>

            <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'log',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'avtar',array('span'=>5,'maxlength'=>255)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->