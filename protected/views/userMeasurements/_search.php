<?php
/* @var $this UserMeasurementsController */
/* @var $model UserMeasurements */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

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
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->