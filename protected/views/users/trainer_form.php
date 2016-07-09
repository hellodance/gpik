<div class="user-massae"><span>Please fill-in below details to highlight your profile data and in-turn increase your employability chances.</span></div>
<div class="form"> 
  <?php  
//                $form = $this->beginWidget('CActiveForm', array( 
//                        'id'=>'default-parent-form', 
//                        'enableAjaxValidation'=>false, 
//                )); 
        ?> 
   
  
 <?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
                array(
                    'id'=>'tab3',
                    'label' =>'Personal', 
                    'content' => $this->renderPartial('_trainerprofileform',array('model'=>$model,'details'=>$details),true), 
                    'active' => true),
                array(
                    'id'=>'tab4',
                    'label' => 'Other Details', 
                    'content' => $this->renderPartial('_trainerdetailsform',array('model'=>$model,'details'=>$details),true)
                    ),
    ),
    ));
 ?>
     <?php   //echo TbHtml::submitButton();?>
        <?php //$this->endWidget(); ?>

</div><!-- form -->