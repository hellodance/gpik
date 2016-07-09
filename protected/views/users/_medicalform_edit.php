<div class="form"> 

    <?php 
    $cals = explode(', ',$details->qid);
    ?>
<?php    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'medical-forms'.$details->id,
         'helpType'=>'help-none',
)); ?>
<h5>Medical History/Allergies</h5>
<ul class="login medical">
              <li>
                   
                <p><span>1</span>Have you ever been diagnosed with a heart condition or feel pain in your chest when you do physical activity?</p>
                 <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[0],array('heart_diagnosed_chest_pain'=>'Yes','no_heart_diagnosed_chest_pains'=>'No'),array('separator'=>'')); ?>
                
             </li>
              <li>
                <p><span>2</span> Do you feel dizzy while exercising, running, jogging or walking ?</p>
                <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[1],array('passed_out'=>'Yes','no_passed_out'=>'No'),array('separator'=>'')); ?>
                
              </li>
              <li>
                <p><span>3</span>Have you had a recent hip, knee or any other replacement surgery?</p>
                <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[2],array('replacement_surgery'=>'Yes','no_replacement_surgery'=>'No'),array('separator'=>'')); ?>
              </li>
              <li>
                <p><span>4</span>Are you on medication for diabetes, hypertension or heart ailment ?</p>
                <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[3],array('prescribed_drugs'=>'Yes','no_prescribed_drugs'=>'No'),array('separator'=>'')); ?>
              </li>
              <li>
                <p><span>5</span>Are you pregnant, think you might be pregnant or have you given birth to a baby less than 6 weeks ago?</p>
                <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[4],array('pregnant'=>'Yes','no_pregnant'=>'No'),array('separator'=>'')); ?>
              </li>
              <li>
                <p><span>6</span>Do you have any physical injury, undergone a surgery recently or have any physical problem that would prevent you from doing certain exercises?</p>
                <?php echo TbHtml::radioButtonList('UserDetails_qid',$cals[5],array('injuries'=>'Yes','no_injuries'=>'No'),array('separator'=>'')); ?>
                
              </li>

            </ul>
<div class="disclaimer">
    <h4><strong><u>Disclaimer</u></strong></h4>
    <p>Please consult your physician before starting this or any exercise program. This is especially important for people aged over 35 or people with pre-existing health problems. The advice given on Gympik.com is in no way intended to be a substitute for professional medical advice. Discontinue your exercise if you feel  pain, severe discomfort, nausea, dizziness, or shortness of breath. Start slowly and at the level that is appropriate for you. Not all exercise plans are suitable for everyone.</p>
</div>
   
 <?php $this->endWidget(); ?>

</div><!-- form -->