<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */
?>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
         'action'=>Yii::app()->createUrl('users/create'),
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

    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
 <ul class="login">
    <?php echo $form->errorSummary($model); ?>

            <?php //echo $form->textFieldControlGroup($model,'mas_role_id',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'trainer_id',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'featured',array('span'=>5)); ?>
             <?php echo $form->textFieldControlGroup($details,'fname',array('span'=>5,'maxlength'=>25,'required' => true,)); ?>
             
            <?php echo $form->textFieldControlGroup($details,'lname',array('span'=>5,'maxlength'=>25,'required' => true,)); ?>

            <?php echo $form->textFieldControlGroup($details,'mobile_no',array('span'=>5,'maxlength'=>12,'required' => true,)); ?>
     
            <?php //echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255,'required' => true,)); ?>
                
            <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>30,'required' => true,)); ?>
            <?php echo $form->passwordFieldControlGroup($model,'repeat_password',array('span'=>5,'maxlength'=>30,'required'=>true)); ?> 
            <?php //echo $form->textFieldControlGroup($model,'activation_key',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo TbHtml::checkBox('istrainer', false, array('label' => 'Are you a Fitness Expert?','labelOptions'=>array('style'=>'width:40%;float:left;'))); ?>
            <?php // echo TbHtml::radioButton('istrainer',false,array('label'=>'Are you a Healthcare Professional?')); ?>
            <?php echo TbHtml::dropDownList( 'type_id','',  TrainerType::model()->getTrainerTypeDropDown(), array('label' => ' ','style'=>'display:none;width:29%!important;','class'=>'inlineclas'));  ?>
            <?php //echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>
            <?php // echo $form->radioButtonList($model,'showon',$selected ,array('labelptions'=>' ','required'=>true)); ?>
            <?php //echo $form->textFieldControlGroup($model,'log',array('span'=>5,'maxlength'=>255)); ?>
            <div class="column2" style  ="width: 25%;">
<!--            <button class="btn btn-primary">Register</button>-->
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Register' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
            </div>
 </ul>
    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
       $(document).on('click','#istrainer',function () {
                $(".inlineclas").toggle(this.checked);
            });
});
</script>