<?php
	  $actionId =  Yii::app()->controller->action->id;
         // echo $actionId;
	//  $controller = Yii::app()->controller->id;
	$homelink = Yii::app()->request->baseUrl.'/images/gympik-logo.gif' ;
	  $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	  $segments = explode('/', $_SERVER['REQUEST_URI_PATH']);

?>
<div class="container">
    <div class="row-fluid">
      <div class="span2 logo">
          <?php if ($actionId =='userdashboard' || $actionId =='traindashboard') { ?>
          <a href="<?php  echo Yii::app()->params['siteUrl'] ?>">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gympik-logo.gif" alt="" />
          </a>
          <?php } else if(Yii::app()->user->isTrainer()){ 
                echo TbHtml::link('<img src="'.$homelink.'" />',array('users/traindashboard','id'=> Yii::app()->user->id));}
                else if(Yii::app()->user->isUser()){
                echo TbHtml::link('<img src="'.$homelink.'" />',array('users/userdashboard','id'=> Yii::app()->user->id));
                } else{ ?>
               <a href="<?php  echo Yii::app()->params['siteUrl'] ?>">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gympik-logo.gif" alt="" />
          </a>
          <?php }?>
      </div>
<div class="span6 topn-nav">

        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                            'brandLabel' => false,
                            'collapse' => true,
                            'display' => null, // default is static to top
                            'items' => array(
                                            array(
                                                'class' => 'bootstrap.widgets.TbNav',
                                                'encodeLabel'=>false,
                                                
                                                'items' => array(
                                                                array('label' => 'Find Fitness <br />Professionals',
                                                                    'url' => '#',
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal8',
                                                                    
                                                                    'items'=>array(
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Aerobics'),
                                                                                    'url'=>array('#'),
                                                                                    'id'=>'aerobics',
                                                                                    'val'=>5


                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Choreographer'),
                                                                                    'url'=>array('#'),
                                                                                     'id'=>'choreographer',
                                                                                     'val'=>8
                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Martial Arts'),
                                                                                    'url'=>array('#'),
                                                                                     'id'=>'martial',
                                                                                     'val'=>6
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Nutritionist / Dietician'),
                                                                                    'url'=>array('#'),
                                                                                    'id'=>'diet',
                                                                                    'val'=>2
                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Physical Trainer'),
                                                                                    'url'=>array('#'),
                                                                                     'id'=>'physical',
                                                                                     'val'=>1
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Physiotherapist'),
                                                                                    'url'=>array('#'),
                                                                                    'id'=>'physio',
                                                                                    'val'=>3
                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Yoga'),
                                                                                    'url'=>array('#'),
                                                                                     'id'=>'yoga',
                                                                                     'val'=>4
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Zumba'),
                                                                                    'url'=>array('#'),
                                                                                    'id'=>'zumba',
                                                                                    'val'=>7
                                                                                ),
                                                                        )


                                                                    ),
                                                array('label' => 'How <br />It Works', 'url' => array('site/how'),'class' => 'hoverout'),
                                                array('label' => 'About <br />Gympik', 'items'=>array(
                                                                                array(
                                                                                    'label' => Yii::t('user', 'About us'),
                                                                                    'url' => array('site/about')


                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Team'),
                                                                                     'url' => array('/about'.'#team'),
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Advisors'),
                                                                                     'url' => array('/about'.'#advisors'),
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'News'),
                                                                                     'url' => array('/about'.'#news'),
                                                                                ),
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Contact us'),
                                                                                     'url' => array('/about'.'#contact'),
                                                                                ),
                                                                                
                                                                        )),
                                                array('label' => 'Why <br />Gympik', 'url' => array('site/why'),'class' => 'hoverout'),
                                                array('label' => 'Health <br />Guide','items'=>array(
                                                                                array(
                                                                                    'label' => Yii::t('user', 'Tools'),
                                                                                    'url'=>array('site/calculator'),


                                                                                ),
                                                                                 array(
                                                                                    'label' => Yii::t('user', 'Articles'),
                                                                                     'url' => array('site/healthguide'),
                                                                                ),
                                                                                
                                                                        )),
                                                array('label' => 'Fitness<br />Professionals', 'url' => array('site/trainers'),'class' => 'hoverout'),

                                                    ),
                                                ),
                                            ),
                            )); ?>
      </div>
      <div class="span4 client-area">
          <ul>
          <?php if(Yii::app()->user->isGuest){?>
            <li><?php echo TbHtml::link('<i class="sign-in"></i>Sign in', '#', array(
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal',
                                            ));?></li>
            <li> <?php echo TbHtml::link('<i class="register"></i>Register', '#', array(
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal1',
                                            ));?>
            </li>
	    <?php } else{ $profileimg = Yii::app()->request->baseUrl.'/avtar/'.Yii::app()->user->profile_image ; ?>
            <li><?php 
            if(Yii::app()->user->isTrainer()){echo TbHtml::link('<i><img src="'.$profileimg.'"></i>'.Yii::app()->user->name,array('users/EditTrainerProfile','id'=> Yii::app()->user->id),array('id'=>'dashlinker','data-placement'=>'left' ,'data-content'=>'You can go to your dashboard on clicking this link!'));
            }else if(Yii::app()->user->isUser()){
            echo TbHtml::link('<i><img src="'.$profileimg.'"></i>'.Yii::app()->user->name,array('Users/EditFirstprofile','id'=> Yii::app()->user->id),array('id'=>'dashlinker','data-placement'=>'left' ,'data-content'=>'You can go to your dashboard on clicking this link!'));} ?></li>
            <li><?php echo TbHtml::link('<i class="signout"></i>Signout',array('site/logout')); ?></li>
		  <!--<li><?php echo Yii::app()->user->name; echo TbHtml::link('Logout',Yii::app()->request->baseUrl.'/site/logout/');?></li>-->
		 <?php } ?>
       </ul>
          
      </div>
    </div>
  </div> 
<script type="text/javascript">
jQuery(document).ready(function($) { 
   var action = 'userdashboard';
   var pathname = window.location.pathname;
   if (pathname.toLowerCase().indexOf('userdashboard') >= 0){
      $('#dashlinker').popover('hide');
    }else{
//         $('#dashlinker').popover('show');
//            window.setTimeout(function(){
//                $('#dashlinker').popover('hide');
//            }, 2500);
    }
   
    $('li.dropdown').hover( 
            function () { $(this).addClass('open')},
            function () {}
    );
    $('.dropdown-menu').hover( 
            function () {},
            function () { $('li.dropdown').removeClass('open')}
    );
    $('.hoverout').hover(
        function(){$('li.dropdown').removeClass('open')},
        function(){}
        )
    //2500 are the ms until the timeout is called
$(document).on('click','#dashlinker',function(){
    $('#dashlinker').popover('hide');
});
//console.log($('li.dropdown a'));
//$('li.dropdown a').addClass('drop-arrow');
$('li.dropdown a').attr('id', 'dLabel');
var target = document.location.hash.replace("#", "");
if (target.length) {
    
    if(target=="login"){
      $(".client-area").find("a")[0].click();
    }
    else if(target=="modal2link"){
      $('#modal2').modal('show');
    }
else if(target=="modal3link"){
      $('#modal3').modal('show');
    }
}else{    
}
});
</script>