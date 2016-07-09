<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-measurements-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'weight',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'arms',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'calves',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'chest',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'forearms',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'hips',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'neck',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'thighs',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'waist',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'adddate',array('span'=>5)); ?>

            <?php echo $form->textAreaControlGroup($model,'mnotes',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'reserve',array('span'=>5,'maxlength'=>255)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->