<?php
/* @var $this TrainerDetailsController */
/* @var $data TrainerDetails */
?>
<?php // echo '<pre>'; print_r($data); echo '</pre>'; ?>
<?php// echo ($index % 2) ? 'row-fluid' : 'even';?>
<?php $pageSize = $widget->dataProvider->getPagination()->pageSize; ?>
<?php if($index == 0) echo '<div class="row-fluid">'; ?>

<?php
$itemCount = $widget->dataProvider->getItemCount();
//if($index==$itemCount/2) {

 if( $data->gender == 1 ){
     
    $avtarmale = AvtarRandom::model()->findAllByAttributes(array('gender'=>1));
        $keym = array_rand($avtarmale);
         $valuem = $avtarmale[$keym];
 } else{
 $avtarfemale = AvtarRandom::model()->findAllByAttributes(array('gender'=>0));
   $keyf = array_rand($avtarfemale);
    $valuef = $avtarfemale[$keyf];
 }
  
?>

<?php // } if($index==0  || $index==$itemCount/2)  { ?>

<?php // } ?>
    <?php //echo ($index % 2) ? 'row-fluid' : 'even';?>
    
  	<div class="span6 result-box">
    	<div class="box_wrapper">
            <div class="imgBox">
                <a href="<?php echo Yii::app()->createUrl('TrainerDetails/trainerprofiles',array('id'=>$data->id)); ?>">
                    <?php if($data->avtar){ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/avtar/<?php echo $data->avtar; ?>" height="118" width="118" alt="" />
                            <?php } else{ 
                              
                                ?><img src="<?php echo Yii::app()->request->baseUrl ?>/random_avtar/<?php echo $data->gender == 1 ?   $valuem->name :  $valuef->name ; ?>" height="118" width="118" alt="" /> <?php } ?>
                    
                </a>
            </div>
        <div class="imgright">
            <a href="<?php echo Yii::app()->createUrl('TrainerDetails/trainerprofiles',array('id'=>$data->id)); ?>"><strong><?php echo $data->fname.' '.$data->lname;?></strong></a>
            <div class="sr_row">
            	<strong>Gender :</strong><span>
                    <?php echo $data->gender == 1 ? 'Male' :'Female'; ?>
                </span>
            </div>
            <div class="sr_row">
            	<strong>Experience: </strong><span><?php echo $data->exp_1.' Years' ;?></span>
            </div>
            <div class="sr_row">
            	<strong>City :</strong><span><?php echo $data->city->city_name ;?></span>
            </div>
            <div class="sr_row">
            	<strong>INR: </strong><span><?php echo $data->fees; ?></span>
            </div>
        </div>
            <p><?php if($data->description){echo substr($data->description, 0,150).'...';}else{ ?><br /><?php } ?><a href="<?php echo Yii::app()->createUrl('TrainerDetails/trainerprofiles',array('id'=>$data->id)); ?>" style="float:right;">Read More</a> </p>
        </div>
    </div>    


<?php if($index != 0 && $index != $pageSize && ($index + 1) % 2 == 0)
    echo '</div><div class="row-fluid">'; ?>
 
<?php if(($index + 1) == $pageSize ) echo '</div>'; ?>
<?php // if($index==$itemCount-1): ?>
<!--</div>-->
<?php // endif; ?>