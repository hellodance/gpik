<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */
?>
<?php if(Yii::app()->user->hasFlash('success')):?>
  <?php echo Yii::app()->user->getFlash('success'); ?>
<?php endif; ?>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
         'action'=>Yii::app()->createUrl('users/create'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        
)); ?>

    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
 <ul class="login">
    <?php echo $form->errorSummary($model); ?>

            <?php //echo $form->textFieldControlGroup($model,'mas_role_id',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'trainer_id',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'featured',array('span'=>5)); ?>
             <?php echo $form->textFieldControlGroup($details,'fname',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($details,'lname',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($details,'mobile_no',array('span'=>5,'maxlength'=>255)); ?>
     
            <?php //echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255)); ?>
                
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->passwordFieldControlGroup($model,'repeat_password',array('span'=>5,'maxlength'=>255)); ?> 
            <?php //echo $form->textFieldControlGroup($model,'activation_key',array('span'=>5,'maxlength'=>255)); ?>

            <?php //echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'log',array('span'=>5,'maxlength'=>255)); ?>
            <div class="column2">
<!--            <button class="btn btn-primary">Register</button>-->
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Register' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
            </div>
 </ul>
    <?php $this->endWidget(); ?>

</div><!-- form -->