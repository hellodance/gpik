<div class="sliderFram"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/banner-btm.png" alt="" /></div>
<div id="slider">
    <div class="image-slider">
      <ul class="slides">
          <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/site/page',array('view'=>'consult')) ?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_005.jpg" alt="" width="2000" height="553"></a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/site/page',array('view'=>'consult','#'=>'specialist')) ?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb.jpg" alt="" width="2000" height="553"></a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/site/page',array('view'=>'consult','#'=>'eat')) ?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_002.jpg" alt="" width="2000" height="553"></a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/site/page',array('view'=>'consult','#'=>'better')) ?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_003.jpg" alt="" width="2000" height="553"></a></li>
        <li><a href="<?php echo Yii::app()->createAbsoluteUrl('/site/page',array('view'=>'consult')) ?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/timthumb_004.jpg" alt="" width="2000" height="553"></a></li>
        
      </ul>
    </div>
    <div class="text-slider">
      <ul>
          <li>
            <h2><?php echo CHtml::link('Free Diet Consultation', array('/site/page', 'view'=>'consult')); ?></h2>
            <p>Register at Gympik and avail a month long free Diet consultation, absolutely free! No hassle, no credit card, no strings attached!</p><br /><p> "Do you know you can lose up to 300% more weight with a combined diet and exercise plan than either alone?"</p>
        </li>
        <li>
          <h2><?php echo CHtml::link('Find Your Coach/Specialist', array('/site/page', 'view'=>'consult','#'=>'specialist')); ?></h2>
          <p>Whether you wish to exercise to reduce fat, do weight training to gain muscle, or increase your strength and flexibility to enhance your lifestyle, Gympik lets you select a coach to match your schedule and location.</p><p> All you need to do is register with us and start searching from our extensive database! </p></li>
        <li>
          <h2><?php echo CHtml::link('Eat Right', array('/site/page', 'view'=>'consult','#'=>'eat')); ?></h2>
          <p>Burn calories, fight fat and increase your metabolism – key to fitness lies in eating right. Get a what-to-eat plan or hire a nutritionist to complement your workout or weight-watching routine. </p><p> Match it with your fitness goal to enhance your physical contour. </p>
          </li>
        <li>
          <h2><?php echo CHtml::link('Look Better, Live Better', array('/site/page', 'view'=>'consult','#'=>'better')); ?></h2>
          <p>Personal training, lifestyle coaching, injury recovery, bodybuilding, cardiovascular exercises, prenatal workout, losing weight, gaining strength, customized supplement programs, tracking your diet –Gympik caters to all your needs. Whatever you need, you will find at Gympik.com. Your personal source for free health and nutrition advice, with innovative and easy-to-use tools to help you get and remain fit.</p>
        </li>
        <li>
<!--          <h2>Regular Workout Difference</h2>-->
          <p style="font-size: 13px; line-height: 1.6">
                  "An ad hoc exercise routine will only help you lose or gain a few pounds. A regular workout with a specialist will improve your health for the lifetime."<br /><br />
                  "No matter what your current level of fitness is, you can start an exercise routine and become fitter and healthier. Studies and researches have shown that even 90 years old women who uses walker, have been benefited from light weight training."</p>
        </li>
        
      </ul>
    </div>
    <div class="elements"> 
        <span style="display: inline;" class="white-box"></span>
        <span class="top-corner"></span>
        <span class="bottom-corner"></span>
    </div>
    <ul style="display: block;" class="flex-direction-nav">
      <li><a class="flex-prev" href="#"></a></li>
      <li><a class="flex-next" href="#"></a></li>
    </ul>
  </div>
<!--<map name="oneslider">
    <area shape ="rect" coords="0,0,5000,5000" href="<?php echo Yii::app()->createUrl('/site/page',array('view'=>'consult','#'=>'diet')) ;?>">
</map>-->