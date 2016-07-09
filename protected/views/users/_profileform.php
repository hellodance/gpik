<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form TbActiveForm */
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/bootstrap.css'); ?>
<style>
    .ui-autocomplete{
        width: 320px !important;
    }
</style>
<div class="form">
<?php //Yii::app()->bootstrap->registerYiistrapCss(); ?>


     <?php //  $this->widget('bootstrap.widgets.TbAlert');
     $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
        'action'=>Yii::app()->createUrl('users/saveprofile'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
         //'helpType'=>'help-none',
	'enableAjaxValidation'=>true,
         'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true, // allow client validation for every field
           ),
        
         
)); ?><?php echo CHtml::hiddenField('YII_CSRF_TOKEN', Yii::app()->request->csrfToken); ?>
    
        <ul class="user-detail">
            <li>
                  <div class="user-row">
                      <?php  if($details->avtar){ ?><img src="<?php echo  Yii::app()->request->baseUrl.'/avtar/'.$details->avtar?>" alt="" class="sab" height="70" width="70" />
                     <?php }else{ ?><img src="<?php echo  Yii::app()->request->baseUrl?>/images/no-image.gif" alt="" class="sab" />                      <?php } ?>
                      <ul>
                        <li>
                            <div id="bfiles" class="files"></div>
                        <?php
                        $this->widget(
                                'yiiwheels.widgets.fileupload.WhBasicFileUpload', array(
                            'model'=>$details,
                            'attribute' => 'avtar',
                                    
                            'uploadAction' => $this->createUrl('users/saveprofile'),
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
                                                 console.log(file);
                                                $("<a id= closure/>").text(file.name).appendTo("#bfiles");
                                                $(".sab").attr("src",file.thumbnailUrl);
                                                $("#UserDetails_avtar").css("display","none");
                                                $(document).on("click","#closure", function(){
                                                    $("#UserDetails_avtar").css("display","inline");
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
<!--                    <li class="webcam">
                        <?php echo TbHtml::link('Take Your Photo(webcam)', array('site/photoweb'))?>
                      <input name="Submit" type="submit" value="Take Your Photo (webcam)" />
                    </li>-->
                  </ul>
                </div>
              </li>
              <li><?php echo $form->textAreaControlGroup($details,'description',array('span' => 8,'maxlength'=>200, 'rows' => 2)); ?></li>
              <li>
              <fieldset>
                  <ul>
                      
              <li> <label>First Name</label>
                <?php echo $form->textField($details,'fname',array('disabled'=>'true','class'=>'input-xlarge')); ?></li>
              <li> <label>Last Name</label>
                <?php echo $form->textField($details,'lname',array('disabled'=>'true','class'=>'input-xlarge')); ?></li>
              <li>
                      <label><?php echo $form->labelex($details,'dob'); ?> </label>
                        <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                                                                    'model'=>$details,
                                                                    'attribute' => 'dob',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'yyyy-dd-mm',
                                                                        'endDate'=> '+0d',
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     ' weekStart'=>6,
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                    </li>
              <li> 
               <?php if($details->mobile_no) { ?><label>Mobile No.</label>
               <?php echo $form->textField($details,'mobile_no',array('disabled'=>'true','class'=>'input-xlarge')); } else{ 
                   echo $form->textFieldControlGroup($details,'mobile_no',array('class'=>'input-xlarge'));
               }?></li>
              <li><label>Email Address</label><?php echo $form->textField($model,'email',array('disabled'=>'true')); ?> </li>
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
                    <?php echo $form->textFieldControlGroup($details,'address',array('span'=>5,'maxlength'=>25,'required' => true,)); ?></li>
                  <li>
                    <?php echo $form->textFieldControlGroup($details,'address_2',array('span'=>5,'maxlength'=>25,'required' => true,)); ?></li>
                  </li>
                    <li> <div class="control-group">
                <label for="UserDetails_city_id" class="control-label required">City <span class="required">*</span></label>
                <div class="controls">
                    <select id="UserDetails_city_id" name="UserDetails[city_id]" class="span5" maxlength="255"  ></select>
                </div>
            </div>
                        <?php
//                        echo $form->dropDownListControlGroup($details, 'city_id',Citylist::model()->getCityuserDropDown(), array(
//                                                                    'ajax' => array(
//                                                                            'type'=>'POST', //request type
//                                                                            'url'=>CController::createUrl('site/dynamicstreet'), //url to call.
//                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'update'=>'#UserDetails_street',
//                                                                            //'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
//                                                                            //'data'=>'js:javascript statement' 
//                                                                            //leave out the data key to pass all form values through
//                                                                            )
//                        ));  
                        ?>
                    </li>
                    
                    <li><input type="hidden" id="UserDetails_street" name="UserDetails[street]" value="<?php if($details->street){echo $details->street ;}?>">
                        <?php echo $form->labelEx($details,'street'); ?>
                       <input type="text" maxlength="255" id="streets" name="street" data-provide="typehead">
                        <?php //echo $form->textfield($details,'street'); ?>
                         <?php 
                /*$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'street',
           'source'=>'js: function(request, response) {
                       $.ajax({
                           url: "'.$this->createUrl('site/localitytype').'",
                           dataType: "json",
                           data: {
                               term: request.term,
                               type: $("#UserDetails_city_id").val()
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
                                              $("#UserDetails_street").val(Item_id);
                                                }'
                                        ),
                                   'htmlOptions' => array(
                                        'placeholder' => 'Type the location',
                                            ),
                                        ));*/
 ?>
                <div class="error" style="display: none;color: red;">Please select only suggested value</div>
                        <?php // echo $form->dropDownList($details,'street', array(999=>'other'),array('required'=>'required','empty'=>2));
//                        echo $form->dropDownList($details,'street', array(),array('required'=>'required'));
//                        echo $form->dropDownListControlGroup($details, 'street',Locality::model()->getlocalityDropDown(), array('prompt'=>'Select Locality',
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
                    <li><?php echo $form->textFieldControlGroup($details,'pincode',array('span'=>5,'maxlength'=>10,'required' => true)); ?></li>
                    <li>
                    <label>State</label>
                    <?php echo TbHtml::textFieldControlGroup('state', $details->city->state);  ?>
                  </li>
                    <li>
                        <?php echo $form->dropDownListControlGroup($details, 'country_id',Countries::model()->getCountryuserDropDown(), array('prompt'=>'Select Country','required' => true,'options' => array('IN'=>array('selected'=>true))));  ?>
                    </li>
                   
                    <li>
                        <?php echo $form->textFieldControlGroup($details, 'curweight',array('maxlength'=>3,'required' => true,'placeholder'=>'Kg')); ?>
                    </li>
                     <li>
                        <?php echo $form->textFieldControlGroup($details, 'height',array('maxlength'=>3,'required' => true,'placeholder'=>'Cms')); ?>
                    </li>
                     <li>
                      <?php echo $form->dropDownListControlGroup($details, 'gender',array('1'=>'Male','0'=>'Female'), array('options' => array('1'=>array('selected'=>true))));  ?>
                    </li>
                    <li>
                        <?php echo $form->textFieldControlGroup($details, 'goalweight',array('maxlength'=>3,'required' => true,'placeholder'=>'Kg')); ?>
                    </li>
                   
                  </ul>
                </fieldset>
              </li>
            </ul>
    
        <?php //echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    //'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		   // 'size'=>TbHtml::BUTTON_SIZE_LARGE,
		//)); ?>
        <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        
        $(document).on('click','.icon-calendar',function(){ 
           $(this).parents('.input-append').find('#UserDetails_dob').click();
           $(this).parents('.input-append').find('#UserDetails_dob').focus();
        })
//         var cityid = $('#UserDetails_city_id').val();
          var cityid = "<?php echo $details->city_id;?>";
          var streets1 = "<?php echo $details->locality->locality; ?>";
          
          if(cityid){
        $.combos('#UserDetails_city_id',{
            'urls':'<?php echo CController::createUrl("site/Combobox"); ?>',
            'vals': cityid
            }
        );
        $.ajax({
            type:'POST', //request type
            data :{city_id: cityid }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#UserDetails_street").html(resp);
                           if(streets){
                           $("#street").val(streets1)}
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

        }else{
            $.combos('#UserDetails_city_id',{
            'urls':'<?php echo CController::createUrl("site/Combobox"); ?>',
            'vals': 428
            } );
        $.ajax({
            type:'POST', //request type
            data :{city_id: 428 }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#UserDetails_street").html(resp);
                            if(streets){
                           $("#street").val(streets1)}
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
        $.ajax({
            type:'POST', //request type
            data :{city_id: cityid }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#UserDetails_street").html(resp);
                            if(streets){
                           $("#street").val(streets)}
                        }, //selector to update
             });
              $(document).on('change','#UserDetails_city_id',function(){
            var ids = $(this).val();
           $.ajax({
            type:'POST', //request type
            data :{city_id: ids }, //city id for banglore
            url: '<?php echo CController::createUrl('site/dynamicstreet') ?>', 
            success:function(resp){
                           $("#UserDetails_street").html(resp);
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
        $("#streets").typeahead({
     source: function(query, process){
                cityid = $('#UserDetails_city_id').val();
                $.ajax({
                    url:"<?php echo CController::createUrl('site/localitytype'); ?>",
                    type:'GET',
                    data:'term='+query+'&type='+cityid,
                    datatype:'JSON',
                    
                    success:function(results){
                           var items = new Array;
//                        return process(JSON.parse(data))
                        var newww=  JSON.parse(results);
                              $.map(newww, function(data){
                                var group;
                        group = {
                         id: data.id,
                        name: data.label,    
                        value: data.name,                            
                        toString: function () {
                            return JSON.stringify(this);
                            console.log(this);
                            //return this.app;
                        },
                        toLowerCase: function () {
                    
                            return this.name.toLowerCase();
                        },
                        indexOf: function (string) {
                            return String.prototype.indexOf.apply(this.name, arguments);
                        },
                        replace: function (string) {
                            var value = '';
                            value +=  this.name;
                            if(typeof(this.level) != 'undefined') {
                                value += ' <span class="pull-right muted">';
                                value += this.level;
                                value += '</span>';
                            }
                            return String.prototype.replace.apply(value, arguments);
//                            return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1em;">' + value + '</div>', arguments);
                        }
                    };
                    items.push(group);
                });
               return process(items);
                    }
                
                });
     },
    property: 'name',
    items: 10,
//    minLength: 2,
   updater: function (item) {
        var item = JSON.parse(item);
        $('#UserDetails_street').val(item.id);       
        return item.name;
    }
});
    })
    
    </script>
    