<?php $this->setPageTitle("Gympik- An end-to-end free online platform to help improving lifestyle choices.");?>
<div class="row-fluid">
    <div class="span12">
      <h1>Advertising</h1>
      <p>Thank you for your interest in advertising with us! Please take a moment to carefully fill out the form below so we can better help you.</p>
    </div>
  </div>
  <div class="row-fluid">
      <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'advertise-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),'htmlOptions'=>array('class'=>'form-horizontal advertising')
    )); ?>
       <div class="span6">
   <?php echo $form->textFieldControlGroup($model, 'fname',array('placeholder' => 'Name')); ?>
      <?php echo $form->textFieldControlGroup($model, 'lname',array('placeholder' => 'Name')); ?>
   <?php echo $form->textFieldControlGroup($model, 'email',array('placeholder' => 'Email')); ?> 
            
   <?php echo $form->textFieldControlGroup($model, 'telephone',array('placeholder' => 'Telephone')); ?>
       <?php echo $form->textFieldControlGroup($model, 'mobile',array('placeholder' => 'Mobile')); ?>
           </div>
      <div class="span6">
          <?php echo $form->textFieldControlGroup($model, 'company',array('placeholder' => 'Company')); ?>
          <?php echo $form->textFieldControlGroup($model, 'website',array('placeholder' => 'Website')); ?>
   <?php echo $form->textAreaControlGroup($model, 'comment',array('span' => 7, 'rows' => 3,'style'=>'width:84%')); ?>
       
     
    <div class="controls">           	         
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>
    <?php $this->endWidget(); ?>
  </div>

