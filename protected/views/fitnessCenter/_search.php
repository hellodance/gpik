<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'type',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'url',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'address',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'area',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textAreaControlGroup($model,'speciality',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'total_trainers',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gender',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'timings',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'facilities',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mem_fee',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'reg_fee',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'pay_method',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'adddate',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->