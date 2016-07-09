<div class="form">
<?php  
     $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-details-form',
       'action'=>Yii::app()->createUrl('users/savetrainerprofile'),
//         'helpType'=>'help-none',
         'helpType'=>'help-once',
	'enableAjaxValidation'=>true,
         'clientOptions' => array(
            //'validateOnSubmit' => TRUE,
            'validateOnChange' => true, // allow client validation for every field
           ),
        
         
)); ?><input id="activa" type="hidden" name="qid" />
            <ul class="user-detail">
              <li>
                <fieldset>
                  <legend>Experience summary </legend>
                  <ul>
                    <li>
                      <!--<label><strong>Employer 1</strong></label>-->
                     <?php echo $form->textFieldControlGroup($details,'emp_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label>Year Experience</label>-->
                      <?php echo $form->textFieldControlGroup($details,'exp_1',array('span'=>5,'maxlength'=>3,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label><strong>Employer 2</strong></label>-->
                      <?php echo $form->textFieldControlGroup($details,'emp_2',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label>Year Experience</label>-->
                      <?php echo $form->textFieldControlGroup($details,'exp_2',array('span'=>5,'maxlength'=>3,'required' => true,)); ?>
                    </li>
                    <li>
<!--                      <label>Certifications</label>-->
                      <?php echo $form->textFieldControlGroup($details,'certification_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <label>&nbsp;</label>
                      <?php echo $form->textFieldControlGroup($details,'certification_2',array('span'=>5,'maxlength'=>40)); ?>
                    </li>
                    <li>
<!--                      <label>Education</label>-->
                      <?php echo $form->textFieldControlGroup($details,'edu_1',array('span'=>5,'maxlength'=>25,'required' => true,)); ?>
                    </li>
                    <li>
                      <label>&nbsp;</label>
                      <?php echo $form->textFieldControlGroup($details,'edu_2',array('span'=>5,'maxlength'=>25)); ?>
                    </li>
                  </ul>
                </fieldset>
              </li>
              <li>               
             <?php echo $form->radioButtonListControlGroup($details,'grp_active', array( '1' => 'Yes','0' => 'No',)); ?>
              </li>
            </ul>
            <ul class="user-detail user-d1">
              <li>
                <fieldset>
                  <ul>
                    <li>
                      <!--<label>Speciality</label>-->
                      <?php echo $form->dropDownListControlGroup($details, 'type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose','required' => true));  ?>
                      
                    </li>
                    <li>
<!--                      <label>No. of Year Exp.</label>-->
                      <?php echo $form->textFieldControlGroup($details,'tot_exp',array('span'=>5,'maxlength'=>2)); ?>
                    </li>
                    <li>
                        <?php echo $form->dropDownListControlGroup($details, 'second_type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose','required' => true));  ?>
                    </li>
<!--                    <li>
                      <label>No. of Year Exp.</label>
                      <input name="" type="text" />
                    </li>-->
                    <li>
                      <?php echo $form->textFieldControlGroup($details, 'fees', array('prepend' => 'Rs.','maxlength'=>8,'placeholder'=>'0')); ?>
<!--                      (monthly)-->
                    </li>
                    <li>
<!--                      <label>Facebook Link</label>-->
                      <?php echo $form->textFieldControlGroup($details,'fb_link',array('span'=>5)); ?>
                    </li>
                    
                  </ul>
                </fieldset>
              </li>
            </ul>
     <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
if($('#TrainerDetails_fees').val() == 0){
       $('#TrainerDetails_fees').val('');
}
})
</script>