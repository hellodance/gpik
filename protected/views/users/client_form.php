<?php 
$this->widget('bootstrap.widgets.TbModal', array(
'id' => 'Client-details',
'header' => '<h3>User Details</h3>',
'content'=> $this->renderPartial('client_form_tab',array('model'=>$model,'details'=>$details),true),
//'remote' => $this->renderPartial('users/_clientprofile',$model,true),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>true,
//    'onHidden'=>'function(){ 
//                       $(".client-area").find("a")[1].click();
//                        }',
 'footer'=>'',
    'closeText'=>false,
//    'backdrop'=>false,
    'keyboard'=>false,
    
     'htmlOptions'=>array('class'=>'user-modal',
//         'style'=>'z-index:9999'
         ),
'footer' => array(

TbHtml::Button('Cancel',array('data-dismiss' => 'modal','id'=>'cancelprofilepop')),
//TbHtml::submitButton('Submit', array('id'=>'profilesubmit', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
),
        ));   ?>