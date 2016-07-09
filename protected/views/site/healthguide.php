<!--<div class="row-fluid">
    <div class="span12">
      <h1>Gympik Health Guide</h1>
    </div>
  </div>
<div class="row-fluid">
      <ul class="thumbnails health">
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider'=>$model->activesearch(),
    'itemView'=>'_guideview',
//    'template' =>"{items}\n<div class=\"row-fluid\"><div class=\"span6\">{pager}</div><div class=\"span6\">{summary}</div></div>",
    'viewData'=>array('page'=>$page),
//    'itemsTagName'=>'table',
    //'itemsCssClass'=>'items table table-striped table-condensed',
    'emptyText'=>'<i> Sorry, there are no Health Guide Posted Yet.Check Back Soon.</i>',
    'summaryText'=>''
                  )); 

?>
<?php 
$this->setPageTitle("Gympik- Lifestyle to help you fine-tune your workout/diet plans");

    Yii::app()->clientScript->registerMetaTag('diet plan, exercises weight loss, yoga instructor bangalore, weight loss program, weight losing exercise, dietician bangalore', 'keywords');
    Yii::app()->clientScript->registerMetaTag("Gympik's online health guide which helps you to gain a perfect shaped body with its useful workout and diet plans.", "description");

?>
 </ul>
    </div>-->
     <div class="container inner">
  <div class="row-fluid">
    <div class="span12">
      <h1>Gympik H<span class="thum-left"></span>ealth Guide</h1>
    </div>
  </div>
  <div class="row-fluid">
      <ul class="thumbnails health">
        <li class="span4">
          <div class="thumbnail">
              <div class="thum-left"><?php $img = CHtml::image(Yii::app()->request->baseUrl.'/images/home-gym.jpg'); ?>
                  <?php echo CHtml::link($img, array('/site/page', 'view'=>'nutritions')); ?>
                    </div>
            <div class="thum-right">
                <h3><?php echo CHtml::link('The Basics of Eating Right', array('/site/page', 'view'=>'nutritions')); ?></h3>
            <p>This is not a sermon or a guide about what kind of foods are good or bad, how much and what to eat and when you should eat it.              
            <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'nutritions')); ?></p>
            </div>
          </div>
        </li>
        <li class="span4">
          <div class="thumbnail">
          	<div class="thum-left"><?php $img2 = CHtml::image(Yii::app()->request->baseUrl.'/images/home-gym01.jpg'); ?>
                     <?php echo CHtml::link($img2, array('/site/page', 'view'=>'coach')); ?>
                </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Choosing the Right Coach', array('/site/page', 'view'=>'coach')); ?></h3>
            <p>Physical fitness and health is not just about running on the treadmill till your lungs burst or lifting weights till your muscles groan.               
             <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'coach')); ?></p>
            </div>
          </div>
        </li>
        <li class="span4">
          <div class="thumbnail">
          	<div class="thum-left"><?php $img3 = CHtml::image(Yii::app()->request->baseUrl.'/images/home-gym02.jpg'); ?>
                     <?php echo CHtml::link($img3, array('/site/page', 'view'=>'workout')); ?>
                </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Workout Guide', array('/site/page', 'view'=>'workout')); ?></h3>
            <p>Fitness, health, nutrition, exercise, diet, physical training, gymming, cardiovascular exercise- are all pieces of a jigsaw puzzle that can.                
                <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'workout')); ?></p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  <div class="row-fluid">
      <ul class="thumbnails health">
        <li class="span4">
          <div class="thumbnail">
              <div class="thum-left"><?php $img4 = CHtml::image(Yii::app()->request->baseUrl.'/images/hg-artical4.jpg'); ?>
              <?php echo CHtml::link($img4, array('/site/page', 'view'=>'smarteat')); ?>
              </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Eat Smart, Eat Right', array('/site/page', 'view'=>'smarteat')); ?></h3>
            <p>Everywhere you look, it’s like people are chomping, munching, guzzling and burping their way into what’s left of the year and fast is the way to go.
                <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'smarteat')); ?></p>
            </div>
          </div>
        </li>
        <li class="span4">
          <div class="thumbnail">
              <div class="thum-left"><?php $img4 = CHtml::image(Yii::app()->request->baseUrl.'/images/thumpost.jpg','',array('style'=>'margin-left:30px;','width'=>274)); ?>
              <?php echo CHtml::link($img4, array('/site/page', 'view'=>'exercise')); ?>
              </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Maximize Exercise Benefits', array('/site/page', 'view'=>'exercise')); ?></h3>
            <p>Many people feel that they are pretty consistent with their workout regimen but find that their body is not getting any fitter.
                <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'exercise')); ?></p>
            </div>
          </div>
        </li>
        <li class="span4">
          <div class="thumbnail">
              <div class="thum-left"><?php $img4 = CHtml::image(Yii::app()->request->baseUrl.'/images/eat_habit_home.jpg','',array('style'=>'')); ?>
              <?php echo CHtml::link($img4, array('/site/page', 'view'=>'habits')); ?>
              </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Healthy Eating Habits', array('/site/page', 'view'=>'habits')); ?></h3>
            <p>Childhood is the time to instil lifelong eating and exercise habits that contribute to good health.Nutrition affects children’s ability to learn
                <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'habits')); ?></p>
            </div>
          </div>
        </li>
        
      </ul>
    </div>
  <div class="row-fluid">
      <ul class="thumbnails health">
        <li class="span4">
          <div class="thumbnail">
              <div class="thum-left"><?php $img4 = CHtml::image(Yii::app()->request->baseUrl.'/images/stress_home.jpg'); ?>
              <?php echo CHtml::link($img4, array('/site/page', 'view'=>'stress')); ?>
              </div>
            <div class="thum-right">
            <h3><?php echo CHtml::link('Stress and Weight', array('/site/page', 'view'=>'stress')); ?></h3>
            <p>High stress levels and weight gain often go hand in hand. Stress can also be an obstacle while losing weight.
                <?php echo CHtml::link('Read More&nbsp; &raquo;', array('/site/page', 'view'=>'stress')); ?></p>
            </div>
          </div>
        </li>
       
        
      </ul>
    </div>
</div>