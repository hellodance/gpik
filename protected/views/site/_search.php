<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

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
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->