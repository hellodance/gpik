<?php
/* @var $model TrainerDetails */
/* @var $form TbActiveForm */
?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/citycombo.js"></script>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="span-6">
            <?php echo $form->textFieldControlGroup($model->userdetail,'fname',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'lname',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'mobile_no',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'description',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'address',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'address_2',array('span'=>5,'maxlength'=>255)); ?>
    </div>
    <div class="span-6">
            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/avtar/'.$model->userdetail->avtar); ?>
            <div class="control-group">
                <label for="UserDetails_city_id" class="control-label required">City <span class="required">*</span></label>
                <div class="controls">
                    <select id="UserDetails_city_id" name="UserDetails[city_id]" class="span5" maxlength="255" value="<?php echo $model->userdetail->city_id ;?>"></select>
                </div>
            </div>
                <?php // echo $form->dropDownListControlGroup($model->userdetail,'city_id',Citylist::model()->getCityuserDropDown(),array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model->userdetail,'pincode',array('span'=>5,'maxlength'=>255)); ?>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
        <?php echo TbHtml::linkbutton('Cancel',array('url'=> Yii::app()->createUrl('Admin/Useradmin'), 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>    
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
    
    <script>
   $(document).ready(function () {
        $.combos('#UserDetails_city_id',{
            'urls':'<?php echo CController::createUrl("site/Combobox"); ?>',
            'vals':'<?php echo $model->userdetail->city_id ;?>'
            }
        );
       
});
    </script>
    <style>
        .optiongrp { border-bottom: 1px dotted #000; }
    </style>