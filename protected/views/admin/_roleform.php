<?php
/* @var $this GuideController */
/* @var $model Guide */
/* @var $form TbActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                               'id'=>'role-form',
                               'enableAjaxValidation'=>true,
                               'clientOptions' => array(
                                                        'validateOnSubmit' => true,
                                                        'validateOnChange' => true, // allow client validation for every field
                                                       ),
                               'action'=>Yii::app()->createUrl('Admin/Addrole')
      )); 
 ?>
 <p class="help-block">Fields with <span class="required">*</span> are required.</p>
 <?php echo $form->errorSummary($model); ?>
 <?php echo $form->textFieldControlGroup($model,'name',array('span'=>4,'maxlength'=>255)); ?>
 <div class="form-actions">
      <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY,'size'=>TbHtml::BUTTON_SIZE_LARGE,)); ?>
      <?php echo TbHtml::linkbutton('Close', array('url'=> Yii::app()->createUrl('Admin/rolemanagement'),'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE,'data-dismiss' => 'modal')) ?>  
 </div>
 <?php $this->endWidget(); ?>
</div><!-- form -->