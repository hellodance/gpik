<?php
	//  $actionId =  Yii::app()->controller->action->id;
	//  $controller = Yii::app()->controller->id;
	
	  $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	  $segments = explode('/', $_SERVER['REQUEST_URI_PATH']);

?>


 <div class="container">
    <div class="row-fluid">
      <div class="span2 logo"><a href="#first-reg" role="button" data-toggle="modal<?php // echo Yii::app()->params['siteUrl'] ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gympik-logo.gif" alt="" /></a></div>

<div class="span6 topn-nav">

        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => false,
            'collapse' => true,
    'display' => null, // default is static to top
    'items' => array(
    array(
    'class' => 'bootstrap.widgets.TbNav',
    'items' => array(
        array('label' => 'Board', 'url' => array('admin/admin')),
        array('label' => 'Notification', 'url' => array('admin/notifymsg')),
        array('label' => 'Fitness centers', 'url' => array('FitnessCenter/admin')),
        array('label' => 'Professionals', 'url' => array('Admin/TrainerAdmin')),
        ),
    ),
    ),
    )); ?>
      </div>
      <div class="span4 client-area">
          <ul>
          <?php if(Yii::app()->user->isGuest){?>
            <li><?php echo TbHtml::link('<i class="sign-in"></i>Logout', 'site/logout');?></li>
            	    <?php } else{ ?>
            <!--<li><a href="#" role="button" data-toggle=""><i><img src="<?php echo Yii::app()->request->baseUrl?>/<?php echo Yii::app()->user->profile_image; ?>" alt="" /></i><?php echo Yii::app()->user->name;?></a></li>-->
            <li><?php echo TbHtml::link('<i class="signout"></i>Signout',array('site/logout')); ?></li>
		  <!--<li><?php echo Yii::app()->user->name; echo TbHtml::link('Logout',Yii::app()->request->baseUrl.'/site/logout/');?></li>-->
		 <?php } ?>
       </ul>
      </div>
    </div>
  </div> 