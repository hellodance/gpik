<li class="span4">
          <div class="thumbnail">
          	<div class="thum-left"><a href="<?php echo Yii::app()->createUrl('Site/guide',array('id'=>$data->id)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $data->thumb; ?>" alt="" /></a></div>
            <div class="thum-right">
            <h3><a href="<?php echo Yii::app()->createUrl('Site/guide',array('id'=>$data->id)); ?>"><?php echo $data->title; ?></a></h3>
            <p><?php echo substr($data->excerpt, 0,150); ?>
            <a href="<?php echo Yii::app()->createUrl('Site/guide',array('id'=>$data->id)); ?>">Read More&nbsp; &raquo;</a></p>
            </div>
          </div>
</li>
        
     