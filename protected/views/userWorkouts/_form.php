<?php
/* @var $this UserWorkoutsController */
/* @var $model UserWorkouts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-workouts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'worktype_id'); ?>
		<?php echo $form->textField($model,'worktype_id'); ?>
		<?php echo $form->error($model,'worktype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workout_id'); ?>
		<?php echo $form->textField($model,'workout_id'); ?>
		<?php echo $form->error($model,'workout_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distance'); ?>
		<?php echo $form->textField($model,'distance'); ?>
		<?php echo $form->error($model,'distance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adddate'); ?>
		<?php echo $form->textField($model,'adddate'); ?>
		<?php echo $form->error($model,'adddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speed'); ?>
		<?php echo $form->textField($model,'speed'); ?>
		<?php echo $form->error($model,'speed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incline'); ?>
		<?php echo $form->textField($model,'incline'); ?>
		<?php echo $form->error($model,'incline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calories'); ?>
		<?php echo $form->textField($model,'calories'); ?>
		<?php echo $form->error($model,'calories'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set1'); ?>
		<?php echo $form->textField($model,'set1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set2'); ?>
		<?php echo $form->textField($model,'set2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set3'); ?>
		<?php echo $form->textField($model,'set3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set4'); ?>
		<?php echo $form->textField($model,'set4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set5'); ?>
		<?php echo $form->textField($model,'set5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'set6'); ?>
		<?php echo $form->textField($model,'set6',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'set6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'intake_note'); ?>
		<?php echo $form->textArea($model,'intake_note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'intake_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'workout_note'); ?>
		<?php echo $form->textArea($model,'workout_note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'workout_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->