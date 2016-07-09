<div class="container section1">
    <div class="row-fluid">
      <div class="span12">
        <h1><i><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/magic-icon.gif" alt="" /></i><span>Gympik</span> - An end-to-end free online platform that helps improving lifestyle choices</h1>
        <div class="stature">
          <ul>
            <li> <strong>Search</strong> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/search-img.gif" alt="" />
              <p>A personal coach, who's professionally qualified to meet your needs.</p>
            </li>
            <li> <strong>Plan</strong> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plan-img.gif" alt="" />
              <p>Your daily workout routine with diet plans to help you keep on course.</p>
            </li>
            <li> <strong>Measure</strong> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/measure-img.gif" alt="" />
              <p>Daily progress to help keep you aligned to a long term fitness goal.</p>
            </li>
            <li> <strong>Track</strong> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/track-img.gif" alt="" />
              <p>End-to-End lifestyle to help you fine-tune your workout/diet plans.</p>
            </li>
            <li> <strong>Improve</strong> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/improve-img.gif" alt="" />
              <p>Compare your progress, make a favorable action plan and improve your health.</p>
            </li>
          </ul>
<!--          <h2>An end-to-end free online platform to help improving lifestyle choices</h2>-->
        </div>
      </div>
    </div>
  </div>
  <div class="section2">
    <div class="container">
      <div class="row-fluid">
        <div class="span4 content-box">
          <div class="img-box">
            <div class="img-fram"><a href="#myModal1" role="button" data-toggle="modal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumb-img-fram.png" alt="" /></a></div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img01.jpg" alt="" /> </div>
          <a href="#myModal1" role="button" data-toggle="modal"><strong>Trainers Registration</strong></a>
          <p>Are you a fitness specialist? or a nutritionist ? Enhance your employability by registering on Gympik. Get new clients or collaborate with others in the same profession to plan better programs. Make your personalized profile page at Gympik and showcase your strengths without any referral fees or lead charges.</p>
        </div>
        <div class="span4 content-box">
          <div class="img-box">
            <div class="img-fram"><a href="#myModal8" role="button" data-toggle="modal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumb-img-fram.png" alt="" /></a></div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/search_trainer.jpg" alt="" /> </div>
          <a href="#myModal8" role="button" data-toggle="modal"><strong>Search Trainers</strong></a>
          <p>Gympik has an extensive network of Fitness Experts- Physiotherapist, Personal Trainers, Nutritionist, Aerobics Instructors and other health professionals for you to choose and select a specialized expert to guide you in achieving your fitness goals. Enter as much or as little information as you wish and start searching the qualified coach within seconds.</p>
        </div>
        <div class="span4 content-box">
          <div class="img-box">
              <div class="img-fram"><?php $imghtml = CHtml::image(Yii::app()->request->baseUrl.'/images/thumb-img-fram.png');
              if(Yii::app()->user->isGuest){ ?><a href="#myModal" role="button" data-toggle="modal"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumb-img-fram.png" alt="" /></a>
                  <?php }else{ ?><?php echo CHtml::link($imghtml, array('users/userdashboard', 'id'=>Yii::app()->user->id ));} ?>
                </div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/diet_suggestions.jpg" alt="" /> </div>
       <?php  if(Yii::app()->user->isGuest){ ?><a href="#myModal" role="button" data-toggle="modal"><strong>Diet Suggestions and Tracking</strong></a>
             <?php }else{ ?><?php echo CHtml::link('<strong>Diet Suggestions and Tracking</strong>', array('users/userdashboard', 'id'=>Yii::app()->user->id ));} ?>
          <p>Medical science proves that one of the best ways to stay healthy forever is by eating the right food and keeping a track of it. Fad diets and quick fixes will not result in long term benefit.   We have designed an end-to-end platform comprising of free innovative easy-to-use tools to make counting and tracking of calories effortless!</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section3">
    <div class="container">
      <div class="row-fluid">
        <div class="span12"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/btm-img.jpg" alt="" width="267" height="196" />
          <p>We know health matters. For centuries, people believed good health to be their greatest blessing. They thrived to derive benefit from the way they think, eat or carry out their daily routine. What made sense then remains valid now too – only our environment has changed. Today, we may not have the luxury of time to involve ourselves in a rigorous workout routine, but the desire to remain fit remains strong. Gympik brings you top notch trainers, instructors, dieticians and nutritionists to guide you to achieve your fitness goals.</p>
          <p>The portal makes it considerably simple for people like you to hire professional fitness service providers and track end-to-end lifestyle habits. From expert advice to personalized diet charts, calorie tracking and smart mobile phone or tablet applications – whatever you need to keep yourself motivated, we have it. Choose from hundreds of professionals close to where you live, study, work, or party. Make your plans, discover special techniques and reach your fitness level all through Gympik.</p>
          <p>Gympik is also the place to be at for fitness experts. It gives you a platform to show your strengths, manage existing clients and get new ones to grow your business. With our personal profile maker and an online system to track the progress of clients, you’ll soon be on your way to a more efficient you! 
              <!--&nbsp;<a href="<?php echo Yii::app()->createUrl('site/trainers'); ?>" style="text-decoration: underline;">Get in touch today.</a></p>-->
        </div>
      </div>
    </div>
  </div>
 <?php 
   
    $this->widget('bootstrap.widgets.TbModal', array(
'id' => 'myModal8',
'header' => '<h4 id="myModalLabel">Search Trainer</h4>',
'content'=> $this->renderPartial('searchtrainer','',true),
//'remote' => $this->createUrl('site/userlogin'),
//'options' =>array('remote' => 'site/userlogin'),
 'show'=>false,
 'footer'=>false,
/*'footer' => array(
TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
TbHtml::button('Close', array('data-dismiss' => 'modal')),
),*/
)); ?>
                    

