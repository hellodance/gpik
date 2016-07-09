    <?php
/* @var $this GuideController */
/* @var $model Guide */
/* @var $form TbActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                               'id'=>'foodtype-form',
                               //'enableAjaxValidation'=>false,
                               'clientOptions' => array(
                                                        'validateOnSubmit' => true,
                                                        'validateOnChange' => true, // allow client validation for every field
                                                       ),
                               'action'=>Yii::app()->createUrl('Admin/Addquote')
      )); 
 ?>
 <p class="help-block">Fields with <span class="required">*</span> are required.</p>
 <?php echo $form->errorSummary($model); ?>
 <?php echo $form->textAreaControlGroup($model,'quote',array('span'=>4,'maxlength'=>255,'required'=>true)); ?>
 <?php $selected =array('1' => 'workout', '2' => 'calorie');  ?>
 <?php echo $form->radioButtonList($model,'showon',$selected ,array('labelptions'=>' ','required'=>true)); ?>
 <div class="form-actions">
      <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY,'size'=>TbHtml::BUTTON_SIZE_LARGE,)); ?>
      <?php echo TbHtml::linkbutton('Close', array('url'=> Yii::app()->createUrl('Admin/quote   management'),'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE,'data-dismiss' => 'modal')) ?>  
 </div>
 <?php $this->endWidget(); ?>
</div><!-- form -->
