<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'forgot-pass',
'header' => '<h3>Forgot password</h3>',
'content'=> SiteController::renderPartial('_forgotpass',array('model'=>$model),true),//'adasdasdasd',//
//'remote' => $this->renderPartial('_form',array('model'=>$model),true),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>true,
 'footer'=>'',
    'onHidden'=>'function(){ 
                       window.location = "'.CController::createUrl("site/index").'";
                        }',
     'htmlOptions'=>array('class'=>'forgot'),
'footer' => array(

//TbHtml::button('cancel', array('data-dismiss' => 'modal')),
//TbHtml::submitButton('Submit', array('id'=>'profilesubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
)); ?>
