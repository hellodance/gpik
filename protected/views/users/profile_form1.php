<div class="user-massae"><span>Please edit the details to have right <i>Gympik experience</i>.</span></div>
<div class="form"> 
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
                array(
                    'id'=>'tab1',
                    'label' =>'Personal', 
                    'content' => $this->renderPartial('_profileform',array('model'=>$model,'details'=>$details),true), 
                    'active' => true),
                array(
                    'id'=>'tab2',
                    'label' => 'Medical History', 
                    'content' => $this->renderPartial('_medicalform',array('model'=>$model,'details'=>$details),true)),
//                    array(
//                    'id'=>'tab2',
//                    'label' => 'Medical History', 
//                    'content' => $this->renderPartial('_medicalform_edit',array('model'=>$model,'details'=>$details),true)),
    ),
    'htmlOptions'=>array('class'=>'profiletabs'),
    ));
 ?>
</div><!-- form -->