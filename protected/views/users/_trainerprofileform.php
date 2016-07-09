<style>
    .ui-autocomplete{
        width: 320px !important;
    }
</style>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-profile-form',
        'action'=>Yii::app()->createUrl('users/savetrainerprofile'),
//        'helpType'=>'help-once',
	'enableAjaxValidation'=>true,
         'clientOptions' => array(
            //'validateOnSubmit' => true,
            'validateOnChange' => true, // allow client validation for every field
           ),
)); ?><?php echo CHtml::hiddenField('YII_CSRF_TOKEN', Yii::app()->request->csrfToken); 
?>
          <ul class="user-detail">
            <li>
                <div class="user-row">
                      <?php  if($details->avtar){ ?><img src="<?php echo  Yii::app()->request->baseUrl.'/avtar/'.$details->avtar?>" alt="" class="sab" height="70" width="70" />
                     <?php }else{ ?><img src="<?php echo  Yii::app()->request->baseUrl?>/images/no-image.gif" alt="" class="sab" />                      <?php } ?>
                      <ul>
                        <li>
                            <div id="bfiles" class="files"></div>
                        <?php $this->widget(
                                'yiiwheels.widgets.fileupload.WhBasicFileUpload', array(
                            'model'=>$details,
                            'attribute' => 'avtar',
                                    
                            'uploadAction' => $this->createUrl('users/savetrainerprofile'),
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
                      <!--<input name="Submit" type="submit" value="Take Your Photo (webcam)" />-->
                    </li>
                  </ul>
                </div>
            </li>
            <li>
              <?php echo $form->textAreaControlGroup($details,'description',array('span' => 8,'minlength'=>100, 'maxlength'=>1400,'rows' => 2)); ?>
            </li>
            <li>
              <fieldset>
                <ul>
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
                    <label>Email Address</label>
                    <?php echo $form->textField($model,'email',array('disabled'=>'true','class'=>'input-xlarge')); ?>
                  </li>
                  <li>
                    <label>Password</label>
                    <input class="input-xlarge" id="disabledInput" type="text" placeholder="********" disabled value="*********">
                  </li>
                  
                </ul>
              </fieldset>
            </li>
          </ul>
          <ul class="user-detail user-d1">
            <li>
              <fieldset>
                <ul>
                  <li>
                    
                    <?php echo $form->textFieldControlGroup($details,'address',array('span'=>5,'maxlength'=>50,'required'=>true)); ?></li>
                  </li>
                  <li>
                    
                    <?php echo $form->textFieldControlGroup($details,'address_2',array('required'=>true)); ?>
                  </li>
                  <li>
                    <li>
                       <div class="control-group">
                <label for="TrainerDetails_city_id" class="control-label required">City <span class="required">*</span></label>
                <div class="controls">
                    <select id="TrainerDetails_city_id" name="TrainerDetails[city_id]" class="span5" maxlength="255"  ></select>
                </div>
            </div>
                        <?php 
//                        echo $form->dropDownListControlGroup($details, 'city_id',Citylist::model()->getCityuserDropDown(), array(
//                                                                    'ajax' => array(
//                                                                            'type'=>'POST', //request type
//                                                                            'url'=>CController::createUrl('site/dynamicstreet'), //url to call.
//                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'update'=>'#TrainerDetails_street',
//                                                                            //'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
//                                                                            //'data'=>'js:javascript statement' 
//                                                                            //leave out the data key to pass all form values through
//                                                                            )
//                        ));  ?>
                    </li>
                  </li>
                  <li><input type="hidden" id="TrainerDetails_street" name="TrainerDetails[street]" value="<?php if($details->street){echo $details->street ;}?>">
                      <?php echo $form->labelEx($details,'street'); ?>
                      <?php 
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'street',
           'source'=>'js: function(request, response) {
                       $.ajax({
                           url: "'.$this->createUrl('site/localitytype').'",
                           dataType: "json",
                           data: {
                               term: request.term,
                               type: $("#TrainerDetails_city_id").val()
                           },
                           success: function (data) {
                                    if(data){
                                     $(".error").css("display","none");
                                   response(data);}else{
//                                  $(".error").css("display","block");
                                   $("#street").val("other");
                                    }
                                   
                           },
                           error: function (errordata) {
                                 $(".error").css("display","none");
                           }
                       })
                        }',
                    'options' => array(
                                    'minLength' => '1',
                                        'select' => 'js: function(e,u){
                                               var Item_id = u.item["id"];
                                              $(this).val(Item_id);
                                              $("#TrainerDetails_street").val(Item_id);
                                                }'
                                        ),
                                   'htmlOptions' => array(
                                        'placeholder' => 'Type the location'
                                            ),
                                        ));
 ?>
                <div class="error" style="display: none;color: red;">Please select only suggested value</div>
                      <?php //echo $form->dropDownList($details,'street', array(999=>'other'),array('required'=>'required','empty'=>2));
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
                    <?php echo $form->textFieldControlGroup($details,'pincode',array('span'=>5,'maxlength'=>10,'minlength'=>4,'required' => true)); ?>
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
              </fieldset>
            </li>
          </ul>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        var cityid = "<?php echo $details->city_id;?>";
       var streets = "<?php echo $details->locality->locality; ?>";
        $(document).on('click','.icon-calendar',function(){  
           $(this).parents('.input-append').find('#TrainerDetails_dob').click();
           $(this).parents('.input-append').find('#TrainerDetails_dob').focus();
        });
         if(cityid){
        $.combos('#TrainerDetails_city_id',{
            'urls':'<?php echo CController::createUrl("site/Combobox"); ?>',
            'vals': cityid
            }
        );
        $.ajax({
            type:'POST', //request type
            data :{city_id: cityid }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#TrainerDetails_street").html(resp);
                            if(streets){
                           $("#street").val(streets)}
                           $.ajax({
                                    type:'POST', //request type
                                    data :{city_id: cityid }, //city id for banglore
                                    url: '<?php echo CController::createUrl('site/TrainDynamicstates') ?>', 
                                    success:function(resps){
                                                   $("#state").val(resps);
                                                }, //selector to update
                                     }); 
                        }, //selector to update
             });

        }else{$.combos('#TrainerDetails_city_id',{
            'urls':'<?php echo CController::createUrl("site/Combobox"); ?>',
            'vals': 428
            }
        );
        $.ajax({
            type:'POST', //request type
            data :{city_id: 428 }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#TrainerDetails_street").html(resp);
                            if(streets){
                           $("#street").val(streets)}
                           $.ajax({
                                    type:'POST', //request type
                                    data :{city_id: 428 }, //city id for banglore
                                    url: '<?php echo CController::createUrl('site/TrainDynamicstates') ?>', 
                                    success:function(resps){
                                                   $("#state").val(resps);
                                                }, //selector to update
                                     }); 
                        }, //selector to update
             });
        
        }
        $(document).on('change','#TrainerDetails_city_id',function(){
            var ids = $(this).val();
           $.ajax({
            type:'POST', //request type
            data :{city_id: ids }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#TrainerDetails_street").html(resp);
                            if(streets){
                           $("#street").val(streets)}
                           $.ajax({
                                    type:'POST', //request type
                                    data :{city_id: ids }, //city id for banglore
                                    url: '<?php echo CController::createUrl('site/TrainDynamicstates') ?>', 
                                    success:function(resps){
                                                   $("#state").val(resps);
                                                }, //selector to update
                                     }); 
                          
                        }, //selector to update
             }); 
        });
        
    })
    </script>