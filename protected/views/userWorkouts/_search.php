<?php
/* @var $this UserWorkoutsController */
/* @var $model UserWorkouts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'worktype_id'); ?>
		<?php echo $form->textField($model,'worktype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workout_id'); ?>
		<?php echo $form->textField($model,'workout_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'distance'); ?>
		<?php echo $form->textField($model,'distance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adddate'); ?>
		<?php echo $form->textField($model,'adddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'speed'); ?>
		<?php echo $form->textField($model,'speed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incline'); ?>
		<?php echo $form->textField($model,'incline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calories'); ?>
		<?php echo $form->textField($model,'calories'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set1'); ?>
		<?php echo $form->textField($model,'set1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set2'); ?>
		<?php echo $form->textField($model,'set2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set3'); ?>
		<?php echo $form->textField($model,'set3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set4'); ?>
		<?php echo $form->textField($model,'set4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set5'); ?>
		<?php echo $form->textField($model,'set5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'set6'); ?>
		<?php echo $form->textField($model,'set6',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'intake_note'); ?>
		<?php echo $form->textArea($model,'intake_note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workout_note'); ?>
		<?php echo $form->textArea($model,'workout_note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->