 <script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.session.js"></script>
<script>
    $(document).ready(function(){
        var avtar = '<?php echo $model->avtar ?>';
        if(avtar){
        }else{
           $('#randavtar').attr('src', $.session.get("avtarimg"));}
    })
    </script>
<div class="row-fluid">
      <div class="span12">
          <h1>Find Your Trainers  <?php if(Yii::app()->user->isTrainer()){ echo TbHtml::link('Dashboard',array('users/traindashboard','id'=>Yii::app()->user->id)); }else if(Yii::app()->user->isUser()){ echo TbHtml::link('Dashboard',array('users/userdashboard','id'=>Yii::app()->user->id)); } ?></h1>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span3 profile-left">
          <div class="img-box1">
              <?php if($model->avtar){ ?>
              <img src="<?php echo Yii::app()->request->baseUrl ?>/avtar/<?php echo $model->avtar?>" alt="" width="235px" />
              <?php }else{?>
              <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no_image.jpg" alt="" width="200px" id="randavtar" />
              <?php } ?>
              <a href="#" class="btn btn-primary">Train With Me</a></div>
        <div class="c-column">
        <h2><?php echo $model->fname.' '.$model->lname;?></h2>
        <div class="c-row">
            <span>Age</span><p><?php 
            if($model->dob != '0000-00-00 00:00:00'){
            $_age = floor((time() - strtotime($model->dob)) / 31556926);
           // echo date("jS M Y",strtotime($model->dob));
            echo $_age;}else{ echo 'Not mentioned';}
            ?> </p>
        </div>
        <div class="c-row">
        	<span>Gender</span><p><?php echo $model->gender == 1 ? Male : Female; ?></p>
        </div>
<!--        <div class="c-row">
        	<h3>Address</h3>
            <ul>
                <li><?php echo $model->address.', '.$model->address_2.', '.$model->city->city_name ;  ?>
                    <br />
                        <?php echo $country->countryName ?>
                    <br />
			Pin Code : <?php echo $model->pincode; ?></li>
            </ul>
        </div>-->
        </div>
      </div>
      <div class="span9">
      	<div class="profile-right">
            <div class="row-fluid">
  	<div class="span12">
            <a href="<?php echo Yii::app()->createUrl('site/search'); ?>" class="btn">&lsaquo; Back</a>
            <?php if (Yii::app()->user->isGuest){?>
            <a href="#" class="btn btn-primary floatr" id="trainwithme" data-toggle = "modal" data-target = "#myModal">Train With Me</a><?php }?>
             <?php if (Yii::app()->user->isTrainer()){?>
            <div class="alerts" style="display: none;"><br /><?php echo TbHtml::blockAlert(TbHtml::ALERT_COLOR_WARNING, 'Currently we are Building this feature.Please check back soon.Thank You!'); ?></div>
             <?php }?>
             <?php if (Yii::app()->user->isUser()){
                 $trainclientrel = TrainerClients::model()->findByAttributes(array('trainer_id'=>$model->user_id,'user_id'=>Yii::app()->user->id));
                 if($trainclientrel){?>
                    <a href="#" class="btn btn-primary floatr" id="reltrain">Train With Me</a>
                     <div class="alerts" style="display: none;"><br /><?php echo TbHtml::blockAlert(TbHtml::ALERT_COLOR_INFO, 'You are already connected with this trainer.Thank You!'); ?></div>
                 <?php }else{
                 ?>
                 <a href="#" class="btn btn-primary floatr" id="trainwithme" data-toggle = "modal" data-target = "#mail-box">Train With Me</a><?php }}?>
    </div>
  </div>
        	<div class="about-me">
            <h5>About Me</h5>
            <div class="popover-box" style="height:75px; overflow-y: auto;"><p><?php echo $model->description; ?> </p></div>
            </div>
             <div class="full">
            <div class="c-row1">
                <h5>Speciality</h5>
                <div class="popover-box"><strong><?php echo $model->primary_type->type_name; ?></strong></div>          
        	</div>
        	<div class="c-row1">
                <h5>Secondary Skills</h5>
                <div class="popover-box"><strong><?php echo $model->sec_type->type_name; ?></strong></div>          
        	</div>
             </div>
            <div class="full">
        	<div class="c-row1">
                <h5>Consultation Fee</h5>
                <div class="popover-box"><strong>Rs.<?php echo $model->fees;?> Per Month</strong></div>          
        	</div>
            <div class="c-row1">
                <h5>Facebook Link</h5>
                <div class="popover-box"><a href="<?php echo $model->fb_link; ?>"><?php echo $model->fb_link; ?></a></div>          
        	</div>
            </div>
<!--            <div class="full">
            <div class="c-row1">
                <h5>Employer 1</h5>
                <div class="popover-box"><strong><?php echo $model->emp_1; ?></strong>
                	<p><?php echo $model->exp_1;?> years</p>
                </div>          
        	</div> 
            <div class="c-row1">
                <h5>Employer 2</h5>
                <div class="popover-box"><strong><?php echo $model->emp_2; ?></strong>
                	<p><?php echo $model->exp_2;?> years</p>
                </div>          
        	</div>
            </div>-->
            <div class="full">
            <div class="c-row1">
                <h5>Certifications</h5>
                <div class="popover-box"><strong><?php echo $model->certification_1;?></strong>
                </div>          
        	</div>   	
        	<div class="c-row1">
                <h5 class="notxt">&nbsp;</h5>
                <div class="popover-box"><strong><?php echo $model->certification_2;?></strong></div>          
        	</div>
                </div>
            <div class="full">
            <div class="c-row1">
                <h5>Education</h5>
                <div class="popover-box"><strong><?php echo $model->edu_1;?></strong></div>          
        	</div>
            <div class="c-row1">
                <h5 class="notxt">&nbsp;</h5>
                <div class="popover-box"><strong><?php echo $model->edu_2;?></strong></div>          
        	</div>
            </div>
        
      </div>
    </div>    
  </div>
  <div class="row-fluid">
  	<div class="span12 profile-footer">
            <a href="<?php echo Yii::app()->createUrl('site/search'); ?>" class="btn">&lsaquo; Back</a>
            <?php if (Yii::app()->user->isGuest){?>
            <a href="#" class="btn btn-primary" id="trainwithme" data-toggle = "modal" data-target = "#myModal">Train With Me</a><?php }?>
             <?php if (Yii::app()->user->isTrainer()){?>
            <div class="alerts" style="display: none;"><br /><?php echo TbHtml::blockAlert(TbHtml::ALERT_COLOR_WARNING, 'Currently we are Building this feature.Please check back soon.Thank You!'); ?></div>
             <?php }?>
             <?php if (Yii::app()->user->isUser()){
                 $trainclientrel = TrainerClients::model()->findByAttributes(array('trainer_id'=>$model->user_id,'user_id'=>Yii::app()->user->id));
                 if($trainclientrel){?>
                    <a href="#" class="btn btn-primary" id="reltrain">Train With Me</a>
                     <div class="alerts" style="display: none;"><br /><?php echo TbHtml::blockAlert(TbHtml::ALERT_COLOR_INFO, 'You are already connected with this trainer.Thank You!'); ?></div>
                 <?php }else{
                 ?>
                 <a href="#" class="btn btn-primary" id="trainwithme" data-toggle = "modal" data-target = "#mail-box">Train With Me</a><?php }}?>
    </div>
  </div>
<div id="mail-box" class="modal hide fade workout-modal message_modal">
    <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3>Send A Request</h3>
</div>
   <?php $mes = new TrainerClientMsg;
   $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                'id'=>'to-user-message-form_'.$model->user_id,
                                'action'=>array('UserWorkouts/Requesttrainer'),
                                'enableAjaxValidation'=>true,
                               'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
                                'htmlOptions'=>array('class'=>'form-horizontal'),
                                ));
                              ?>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span12 message-box">
              
          <input type="hidden" value="<?php echo $model->user_id; ?>" id="note_user_id" name="user_id"> 
            <div  id="messagedata" style="display: none;"></div>
            <div class="control-group">
              <label class="control-label" for="inputTxt">To</label>
              <div class="controls">
                  <input type="text" value ="<?php echo $model->fname.' '.$model->lname;?> " id="inputText" readonly="true" placeholder="" name="reply_to">
            </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputTxt">Subject</label>
              <div class="controls">
                <input type="text"  name="subject" id="inputText" value="Request to join">
                <?php echo $form->error($mes,'subject'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="Massage">Message</label>
              <div class="controls">
                <textarea rows="10"  name="message" required="required"></textarea>
                <?php echo $form->error($mes,'message'); ?>
              </div>
            </div>            
          
        
      </div>
    </div>
  </div>
  <div class="modal-footer">
      
    <button data-dismiss="modal" class="btn">Cancel</button>
    <?php echo TbHtml::ajaxSubmitButton('Send',array('UserWorkouts/Requesttrainer'),array( 'success' => 'js:function(response){
                                      data = JSON.parse(response);
                                     if(data.status == "success"){
                         $("#to-user-message-form_'.$model->user_id.' .modal-footer").html("Message Sent successfully.");
                         $("#to-user-message-form_'.$model->user_id.'")[0].reset();
                         $("#mail-box").modal("hide");
                        }
                         else{
                        $.each(data, function(key, val) {
                        $("#to-user-message-form_'.$model->user_id.' #"+key+"_em_").text(val);                                                    
                        $("#to-user-message-form_'.$model->user_id.' #"+key+"_em_").show();
                        });
                        }       


                        }',),array('class'=>'btn btn-primary'));?>
    
</div>
<?php $this->endWidget(); ?>
</div>
<script>
    $(document).on('click','#reltrain',function(){
        $('.alerts').css('display','block');
        return false;
    })
    </script>