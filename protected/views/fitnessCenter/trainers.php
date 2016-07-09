<?php 
//$this->widget('bootstrap.widgets.TbHeroUnit', array(
//    'heading' => 'Under Construction    !',
//    'content' => '<p>This feature is not ready yet,meanwhile you can explore the Fitness Center Management.</p>' . TbHtml::button('Learn more', array('color' =>TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)),
//)); 
?>
<h1>Create Fitness Professional</h1>



<div class="form" >

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-profile-form',
        'action'=>Yii::app()->createUrl('FitnessCenter/TrainersCreate'),
//        'helpType'=>'help-once',
	'enableAjaxValidation'=>true,
         'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true, // allow client validation for every field
           ),
)); ?><?php echo CHtml::hiddenField('YII_CSRF_TOKEN', Yii::app()->request->csrfToken); ?>
    <div class=" span-6">
          <ul class="user-detail">
                  <li><?php echo $form->textFieldControlGroup($details,'fname',array('span'=>5,'maxlength'=>30,)); ?></li>
                  <li><?php echo $form->textFieldControlGroup($details,'lname',array('span'=>5,'maxlength'=>30,)); ?></li>
                  <li><?php echo $form->dropDownListControlGroup($details, 'type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose','span'=>5));  ?></li>
                  <li><?php echo $form->textFieldControlGroup($details,'mobile',array('span'=>5,'maxlength'=>12,)); ?></li>
                  <li><?php echo $form->textFieldControlGroup($model,'email',array('span'=>5)); ?></li>
                  <li><?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>30)); ?></li>
                  
                  <li><?php echo TbHtml::submitButton($model->isNewRecord ? 'Next' : 'Update',array(
                        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size'=>TbHtml::BUTTON_SIZE_LARGE,
                    )); ?>
                </li>
               
          </ul>
    </div>
    <div class=" span-6">
        
    </div>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        $(document).on('click','.icon-calendar',function(){  
           $(this).parents('.input-append').find('#TrainerDetails_dob').click();
           $(this).parents('.input-append').find('#TrainerDetails_dob').focus();
        });
        var cityid = $('#TrainerDetails_city_id').val();
//        $.ajax({
//            type:'POST', //request type
//            data :{city_id: cityid }, //city id for banglore
//            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
//            success:function(resp){
//                           $("#TrainerDetails_street").html(resp);
//                        }, //selector to update
//             });
    })
    </script>