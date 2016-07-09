<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' -Forgot Password'; ?>

<div class="signup">
	<div class="signup-left">
		<?php   $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id'=>'forgotpass-form',
                        'action'=>Yii::app()->createUrl('site/forgotpass'), 
                             //'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				//'validateOnSubmit'=>true,
                                'validateOnChange'=>true,
			),
			'htmlOptions' => array("class"=>"signup-form"),
		)); ?>
            <fieldset>                  
                  <ul>
                      <li>
<!--                    <label>Email</label>-->
                    <?php echo $form->emailFieldControlGroup($model,'email',array('span'=>4,'maxlength'=>25,'required'=>true)); ?></li>
                     
                  </li>
            </fieldset>
		
                <?php //echo CHtml::link('Login',array('site/login'),array('class'=>'forgotpass')); ?>
	
		<?php echo TbHtml::SubmitButton('Submit',array('site/forgotpass'),array('class'=>'submit-button','color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
	
		<?php $this->endWidget(); ?>
	</div><!-- form -->
	
	<div class="clear"></div>
</div>

