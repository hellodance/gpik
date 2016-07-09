<?php
/* @var $this TrainerDetailsController */
/* @var $model TrainerDetails */
/* @var $form TbActiveForm */
?>
<?php $user = new Users ?>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-details-form',
        'action'=>Yii::app()->createUrl('users/trainercreate'),
        // Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	 //'enableAjaxValidation' => false,
	//'helpType'=>'help-none',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true, // allow client validation for every field
           ),
)); ?>
 <ul class="login">
    <?php //echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'fname',array('span'=>5,'maxlength'=>30,'required'=>true)); ?>
            <?php echo $form->textFieldControlGroup($model,'lname',array('span'=>5,'maxlength'=>30,'required'=>true)); ?>
            <?php echo $form->textFieldControlGroup($model,'mobile',array('span'=>5,'maxlength'=>12,'required'=>true)); ?>
            <?php echo $form->textFieldControlGroup($user,'email',array('span'=>5,'maxlength'=>255,'required'=>true)); ?>
            <?php echo $form->passwordFieldControlGroup($user,'password',array('span'=>5,'maxlength'=>30,'required'=>true)); ?>
            <?php echo $form->passwordFieldControlGroup($user,'repeat_password',array('span'=>5,'maxlength'=>30,'required'=>true)); ?> 
            <?php echo $form->dropDownListControlGroup($model, 'type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose',));  ?>

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