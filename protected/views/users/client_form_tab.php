<div class="form"> 
<?php 
$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => array(
                array(
                    'id'=>'tab1_'.$model->id,
                    'label' =>'Personal', 
                    'content' => $this->renderPartial('_clientprofile',array('model'=>$model,'details'=>$details),true), 
                    'active' => true),
                array(
                    'id'=>'tab2_'.$model->id,
                    'label' => 'Medical History', 
                    'content' => $this->renderPartial('_clientmedical',array('model'=>$model,'details'=>$details),true)),
    ),
    'htmlOptions'=>array('class'=>'profiletabs'),
    ));
    
 ?>
</div><!-- form -->