<div class="form">
     <?php 
     $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'client-form'.$model->id,
)); ?>
     <ul class="user-detail">
            <li>
                  <div class="user-row">
                      <?php
                      if($details->avtar){ ?><img src="<?php echo  Yii::app()->request->baseUrl.'/avtar/'.$details->avtar?>" alt="" class="sab" height="70" width="70" />
                     <?php }else{ ?><img src="<?php echo  Yii::app()->request->baseUrl?>/images/no-image.gif" alt="" class="sab" />                      <?php } ?>
                      <ul>
                        <li>
                          </li>
                  </ul>
                </div>
              </li>
              <li><?php echo $form->textAreaControlGroup($details,'description',array('disabled'=>'true','span' => 8,'maxlength'=>200, 'rows' => 2)); ?></li>
              <li>
              <fieldset>
                  <ul>
                 <li> <label>First Name</label>
                    <?php echo $form->textField($details,'fname',array('disabled'=>'true','class'=>'input-xlarge')); ?></li>
                <li> <label>Last Name</label>
                    <?php echo $form->textField($details,'lname',array('disabled'=>'true','class'=>'input-xlarge')); ?></li>
                <li><label><?php echo $form->labelex($details,'dob'); ?> </label>
                    <?php echo $form->textField($details,'dob',array('disabled'=>'true','class'=>'input-xlarge')); ?></li>
                <li> 
                    <?php if($details->mobile_no) { ?><label>Mobile No.</label>
                    <?php echo $form->textField($details,'mobile_no',array('disabled'=>'true','class'=>'input-xlarge')); } else{ 
                        echo $form->textFieldControlGroup($details,'mobile_no',array('class'=>'input-xlarge'));
                    }?></li>
                <li><label>Email Address</label>
                    <?php echo $form->textField($model,'email',array('disabled'=>'true')); ?> </li>
                <li><label>Password</label><input class="input-xlarge" id="disabledInput" type="text" placeholder="********" disabled></li>
             </ul>
              </fieldset>
        </li>
            </ul>
            <ul class="user-detail user-d1"> 
              <li>
                <fieldset>                  
                  <ul>
                      <li>
                    <?php echo $form->textFieldControlGroup($details,'address',array('disabled'=>'true','span'=>5,'maxlength'=>25,'required' => true,)); ?></li>
                  <li>
                    <?php echo $form->textFieldControlGroup($details,'address_2',array('disabled'=>'true','span'=>5,'maxlength'=>25,'required' => true,)); ?></li>
                  </li>
                    <li><?php echo $form->dropDownListControlGroup($details, 'city_id',Citylist::model()->getCityuserDropDown(), array(
                                                                    'disabled'=>'true',
                        ));  ?></li>
                    <li><label>Locality</label>
                        <?php echo $form->dropDownList($details,'street', array(),array('disabled'=>'true','required'=>'required')); ?>
                        </li>
                    <li><?php echo $form->textFieldControlGroup($details,'pincode',array('disabled'=>'true','span'=>5,'maxlength'=>10,'required' => true)); ?></li>
                    <li>
                    <label>State</label>
                    <?php echo TbHtml::textFieldControlGroup('state', $details->city->state, array('disabled'=>'true',));  ?>
                  </li>
                    <li>
                        <?php echo $form->dropDownListControlGroup($details, 'country_id',Countries::model()->getCountryuserDropDown(), array('prompt'=>'Select Country','disabled'=>'true','required' => true,'options' => array('IN'=>array('selected'=>true))));  ?>
                    </li>
                   <li>
                        <?php echo $form->textFieldControlGroup($details, 'curweight',array('disabled'=>'true','maxlength'=>3,'required' => true,'placeholder'=>'Kg')); ?>
                    </li>
                     <li>
                        <?php echo $form->textFieldControlGroup($details, 'height',array('disabled'=>'true','maxlength'=>3,'required' => true,'placeholder'=>'Cms')); ?>
                    </li>
                     <li>
                      <?php echo $form->dropDownListControlGroup($details, 'gender',array('1'=>'Male','2'=>'Female'), array('disabled'=>'true','options' => array('1'=>array('selected'=>true))));  ?>
                    </li>
                    <li>
                        <?php echo $form->textFieldControlGroup($details, 'goalweight',array('disabled'=>'true','maxlength'=>3,'required' => true,'placeholder'=>'Kg')); ?>
                    </li>
                   
                  </ul>
                </fieldset>
              </li>
            </ul>
     <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        $(document).on('click','.icon-calendar',function(){ 
           $(this).parents('.input-append').find('#UserDetails_dob').click();
           $(this).parents('.input-append').find('#UserDetails_dob').focus();
        })
         var cityid = $('#UserDetails_city_id').val();
        $.ajax({
            type:'POST', //request type
            data :{city_id: cityid }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#UserDetails_street").html(resp);
                        }, //selector to update
             });
    })
    </script>
    