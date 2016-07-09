<style> .datepicker-dropdown{ z-index: 9999;} </style>
<div class="form ">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-profile-forms',
        'action'=>Yii::app()->createUrl('FitnessCenter/Trainerdetails/'.$id),
//        'helpType'=>'help-once',
	'enableAjaxValidation'=>true,
         'clientOptions' => array(
            //'validateOnSubmit' => true,
            'validateOnChange' => true, // allow client validation for every field
           ),
)); ?><?php echo CHtml::hiddenField('YII_CSRF_TOKEN', Yii::app()->request->csrfToken); ?>
    <div class="span-6">
          <ul class="user-detail">
              <legend>Personal summary </legend>
            <?php  if($details->avtar){ ?><img src="<?php echo  Yii::app()->request->baseUrl.'/avtar/'.$details->avtar?>" alt="" class="sab" height="70" width="70" />
                     <?php }else{ ?><img src="<?php echo  Yii::app()->request->baseUrl?>/images/no-image.gif" alt="" class="sab" />                      <?php } ?>
                      
            <li>
                            <div id="bfiles" class="files"></div>
                        <?php $this->widget(
                                'yiiwheels.widgets.fileupload.WhBasicFileUpload', array(
                            'model'=>$details,
                            'attribute' => 'avtar',
//                              'name'=>'avtar',      
                            'uploadAction' => $this->createUrl('FitnessCenter/Trainerdetails/'.$id),
                            'pluginOptions' => array(
                                 'validation'=>array(
                                                'allowedExtensions' => array('jpeg', 'jpg')
                                                ),
                                
                                'dataType' => 'json',
                                
                                'beforeSend'=>'js:function(){
                                       //$("#bprogress").css("display","block");
                                        }',
                                'done' => 'js:function(e, data){
                                               
                                                $.each(data.files, function(i, file){
                                                $("<a id= closure/>").text(file.name).appendTo("#bfiles");
                                                $(".sab").attr("src",file.thumbnailUrl);
                                                $("#TrainerDetails_avtar").css("display","none");
                                                $(document).on("click","#closure", function(){
                                                    $("#TrainerDetails_avtar").css("display","inline");
                                                    $(this).css("display","none");
                                                    })
                                                });
                                                }',
                                                'progressall' => "js:function (e, data) {
                                                var progress = parseInt(data.loaded / data.total * 100, 10);
                                                $('#bprogress .bar').css(
                                                'width',
                                                progress + '%'
                                                );
                                                }"
                                                    )
                                                )
                                    );
                        ?>
   
                            <!-- The global progress bar -->
                            <div id="bprogress" class="progress progress-success progress-striped" style="display: none;">
                            <div class="bar"></div>
                            </div>
                            </li>
            <li>
              <?php echo $form->textAreaControlGroup($details,'description',array('span' => 5,'minlength'=>100, 'maxlength'=>1400,'rows' => 2)); ?>
            </li>
            <li>
                    <label>First Name</label>
                    <?php echo $form->textField($details,'fname',array('disabled'=>'true','class'=>'input-xlarge')); ?>
                  </li>
            <li>
                    <label>Last Name</label>
                    <?php echo $form->textField($details,'lname',array('disabled'=>'true','class'=>'input-xlarge')); ?>
                  </li>
            <li>
                   
                    <?php echo $form->labelex($details,'dob'); ?>
                    <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                                                                    'model'=>$details,
                                                                    'attribute' => 'dob',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                        'endDate'=> '+0d',
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                  </li>
            <li>
                    <label>Mobile No.</label>
                    <?php echo $form->textField($details,'mobile',array('disabled'=>'true','class'=>'input-xlarge')); ?>
                  </li>
            <li>
                    
                    <?php echo $form->textFieldControlGroup($details,'address',array('span'=>5,'maxlength'=>50,'required'=>true)); ?></li>
            <li>
                    
                    <?php echo $form->textFieldControlGroup($details,'address_2',array('required'=>true)); ?>
                  </li>
            <li><?php echo $form->dropDownListControlGroup($details, 'city_id',Citylist::model()->getCityuserDropDown(), array(
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/dynamicstreet'), //url to call.
                                                                            //Style: CController::createUrl('currentController/methodToCall')
                                                                            'update'=>'#TrainerDetails_street',
                                                                            //'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
                                                                            //'data'=>'js:javascript statement' 
                                                                            //leave out the data key to pass all form values through
                                                                            )
                        ));  ?></li>
            <li><label>Locality</label>
                      <?php echo $form->dropDownList($details,'street', array(999=>'other'),array('required'=>'required','empty'=>2));
//                  echo $form->dropDownListControlGroup($details, 'street',Locality::model()->getlocalityDropDown(), array('prompt'=>'Select Locality',
////                                                                    'ajax' => array(
////                                                                            'type'=>'POST', //request type
////                                                                            'url'=>CController::createUrl('site/dynamicstates'), //url to call.
////                                                                            //Style: CController::createUrl('currentController/methodToCall')
////                                                                            'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
////                                                                            //'data'=>'js:javascript statement' 
////                                                                            //leave out the data key to pass all form values through
////                                                                            )
//                        ));   ?>
                        <?php //echo $form->textFieldControlGroup($details,'street',array('span'=>5,'maxlength'=>30)); ?></li>
            <li>
                    <?php echo $form->textFieldControlGroup($details,'pincode',array('width'=>'20%','maxlength'=>10,'minlength'=>4,'required' => true)); ?>
                  </li>
            <li>
                    <label>State</label>
                    <?php echo TbHtml::textFieldControlGroup('state', $details->city->state);  ?>
                  </li>
            <li>
                    <?php echo $form->dropDownListControlGroup($details, 'country_id',Countries::model()->getCountryuserDropDown(), array('prompt'=>'Select Country','required' => true, 'options' => array('IN'=>array('selected'=>true))));  ?>
                  </li>                  
            <li>
                    <?php echo $form->dropDownListControlGroup($details, 'gender',array('1'=>'Male','0'=>'Female'), array('options' => array('1'=>array('selected'=>true))));  ?>
                  </li>
          </ul>
    </div>
    <div class="span-6">
        <legend>Experience summary </legend>
                  <ul>
                    <li>
                      <!--<label><strong>Employer 1</strong></label>-->
                     <?php echo $form->textFieldControlGroup($details,'emp_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label>Year Experience</label>-->
                      <?php echo $form->textFieldControlGroup($details,'exp_1',array('span'=>5,'maxlength'=>3,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label><strong>Employer 2</strong></label>-->
                      <?php echo $form->textFieldControlGroup($details,'emp_2',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <!--<label>Year Experience</label>-->
                      <?php echo $form->textFieldControlGroup($details,'exp_2',array('span'=>5,'maxlength'=>3,'required' => true,)); ?>
                    </li>
                    <li>
<!--                      <label>Certifications</label>-->
                      <?php echo $form->textFieldControlGroup($details,'certification_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                    </li>
                    <li>
                      <label>&nbsp;</label>
                      <?php echo $form->textFieldControlGroup($details,'certification_2',array('span'=>5,'maxlength'=>40)); ?>
                    </li>
                    <li>
<!--                      <label>Education</label>-->
                      <?php echo $form->textFieldControlGroup($details,'edu_1',array('span'=>5,'maxlength'=>25,'required' => true,)); ?>
                    </li>
                    <li>
                      <label>&nbsp;</label>
                      <?php echo $form->textFieldControlGroup($details,'edu_2',array('span'=>5,'maxlength'=>25)); ?>
                    </li>
                    <li>               
             <?php echo $form->radioButtonListControlGroup($details,'grp_active', array( '1' => 'Yes','0' => 'No',)); ?>
              </li>
              <li>
                      <!--<label>Speciality</label>-->
                      <?php echo $form->dropDownListControlGroup($details, 'type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose','required' => true));  ?>
                      
                    </li>
                    <li>
<!--                      <label>No. of Year Exp.</label>-->
                      <?php echo $form->textFieldControlGroup($details,'tot_exp',array('span'=>5,'maxlength'=>2)); ?>
                    </li>
                    <li>
                        <?php echo $form->dropDownListControlGroup($details, 'second_type_id',  TrainerType::model()->getTrainerTypeDropDown(), array('prompt'=>'Please Choose','required' => true));  ?>
                    </li>
<!--                    <li>
                      <label>No. of Year Exp.</label>
                      <input name="" type="text" />
                    </li>-->
                    <li>
                      <?php echo $form->textFieldControlGroup($details, 'fees', array('prepend' => 'Rs.','maxlength'=>8,'placeholder'=>'0')); ?>
<!--                      (monthly)-->
                    </li>
                    <li>
<!--                      <label>Facebook Link</label>-->
                      <?php echo $form->textFieldControlGroup($details,'fb_link',array('span'=>5)); ?>
                    </li>
                  </ul>
    </div>
    <div class="span-10 row-fluid">
        <?php echo TbHtml::submitButton($details->isNewRecord ? 'Next' : 'Update',array(
                        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size'=>TbHtml::BUTTON_SIZE_LARGE,
                    )); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<script>
    $(document).ready(function(){
        $(document).on('click','.icon-calendar',function(){  
           $(this).parents('.input-append').find('#TrainerDetails_dob').click();
           $(this).parents('.input-append').find('#TrainerDetails_dob').focus();
        });
        var cityid = $('#TrainerDetails_city_id').val();
        $.ajax({
            type:'POST', //request type
            data :{city_id: cityid }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#TrainerDetails_street").html(resp);
                        }, //selector to update
             });
             
    })
    </script>
    