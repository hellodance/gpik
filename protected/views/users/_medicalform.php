<div class="form"> 
    <?php 
    $cals = explode(', ',$details->qid);
    ?>
    <?php 
    $details = new UserDetails('medical');?>
<?php    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'medical-form',
        'action'=>Yii::app()->createUrl('users/medicalprofile'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
         'helpType'=>'help-none',
	'enableAjaxValidation'=>false,
         'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,  // allow client validation for every field
           ),
        
         
)); ?>
<h5>Medical History/Allergies</h5>
<ul class="login medical">
              <li>
                   
                <p><span>1</span>Have you ever been diagnosed with a heart condition or feel pain in your chest when you do physical activity?</p>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[0]',array('value'=>'heart_diagnosed_chest_pain','uncheckValue'=>null,'required' => true,)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[0]',array('value'=>'no_heart_diagnosed_chest_pains','uncheckValue'=>null)); ?>
                    No</label>
             </li>
              <li>
                <p><span>2</span> Do you feel dizzy while exercising, running, jogging or walking ?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[1]',array('value'=>'passed_out','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[1]',array('value'=>'no_passed_out','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>3</span>Have you had a recent hip, knee or any other replacement surgery?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[2]',array('value'=>'replacement_surgery','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[2]',array('value'=>'no_replacement_surgery','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>4</span>Are you on medication for diabetes, hypertension or heart ailment ?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[3]',array('value'=>'prescribed_drugs','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[3]',array('value'=>'no_prescribed_drugs','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>5</span>Are you pregnant, think you might be pregnant or have you given birth to a baby less than 6 weeks ago?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[4]',array('value'=>'pregnant','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[4]',array('value'=>'no_pregnant','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>6</span>Do you have any physical injury, undergone a surgery recently or have any physical problem that would prevent you from doing certain exercises?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[5]',array('value'=>'injuries','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[5]',array('value'=>'no_injuries','uncheckValue'=>null)); ?>
                    No</label>
              </li>
<!--              <li>
                <p><span>7</span>Do you currently take any prescribed drugs for blood pressure or a heart condition?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[6]',array('value'=>'bp','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[6]',array('value'=>'no_bp','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>8</span>During the past month, have you had chest pain when you have NOT been doing physical activity?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[7]',array('value'=>'chest_pain','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[7]',array('value'=>'no_chest_pain','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>9</span>Are you currently pregnant, think you might be pregnant or have you given birth less than 6 weeks ago?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[8]',array('value'=>'pregnant','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[8]',array('value'=>'no_pregnant','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>10</span>Have you ever been diagnosed with a heart condition or advised to avoid physical activity by a doctor?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[9]',array('value'=>'heart_diag','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[9]',array('value'=>'no_heart_diag','uncheckValue'=>null)); ?>
                    No</label>
              </li>
              <li>
                <p><span>11</span>Do you have any physical injuries, recent surgeries or physical conditions of any kind that would prevent you from doing certain exercises?</p>
                <label class="radio">
                   <?php echo $form->radioButton($details,'qid[10]',array('value'=>'surgery','uncheckValue'=>null)); ?>
                    Yes</label>
                 <label class="radio">
                   <?php echo $form->radioButton($details,'qid[10]',array('value'=>'no_surgery','uncheckValue'=>null)); ?>
                    No</label>
              </li>-->
            </ul>
<div class="disclaimer">
    <h4><strong><u>Disclaimer</u></strong></h4>
    <p>Please consult your physician before starting this or any exercise program. This is especially important for people aged over 35 or people with pre-existing health problems. The advice given on Gympik.com is in no way intended to be a substitute for professional medical advice. Discontinue your exercise if you feel  pain, severe discomfort, nausea, dizziness, or shortness of breath. Start slowly and at the level that is appropriate for you. Not all exercise plans are suitable for everyone.</p>
</div>
 <?php $this->endWidget(); ?>

</div><!-- form -->
