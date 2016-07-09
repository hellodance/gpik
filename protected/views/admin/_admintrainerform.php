<?php
/* @var $model TrainerDetails */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'trainer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="span-6">
            <?php echo $form->textFieldControlGroup($model,'fname',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model,'lname',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->labelex($model,'dob'); ?>
                    <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                                                                    'model'=>$model,
                                                                    'attribute' => 'dob',
//                                                                    'name'=>'TrainerDetails[dob]',
                                                                    'pluginOptions' => array(
                                                                    'format' => 'yyyy-dd-mm',
                                                                        'endDate'=> '+0d',
                                                                        'pickTime'=> false,
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
        <?php echo $form->dropDownListControlGroup($model,'type_id',TrainerType::model()->getTrainerTypeDropDown(),array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->dropDownListControlGroup($model,'second_type_id',TrainerType::model()->getTrainerTypeDropDown(),array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->textFieldControlGroup($model,'mobile',array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->textAreaControlGroup($model,'description',array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->textFieldControlGroup($model,'address',array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->textFieldControlGroup($model,'address_2',array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->textFieldControlGroup($model,'emp_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
        <?php echo $form->textFieldControlGroup($model,'exp_1',array('span'=>5,'maxlength'=>3,'required' => true,)); ?>
        <?php echo $form->radioButtonListControlGroup($model,'grp_active', array( '1' => 'Yes','0' => 'No',)); ?>
         <input type="hidden" name="avtar" value="<?php echo $model->avtar =='' ?'':$model->avtar ?>" id="avtar" />   
     </div>
    <div class="span-6"> 
            <?php if($model->avtar){ echo CHtml::image(Yii::app()->request->baseUrl.'/avtar/'.$model->avtar,'',array('id'=>'avtarimg')); }else{ echo CHtml::image(Yii::app()->request->baseUrl.'/images/no-image.gif','',array('id'=>'avtarimg')); } ?>
        <li>
                            <div id="bfiles" class="files"></div>
                        <?php
                        $this->widget(
                                'yiiwheels.widgets.fileupload.WhBasicFileUpload', array(
                            'model'=>$model,
                            'attribute' => 'avtar',
                                    
                            'uploadAction' => $this->createUrl('admin/saveavtar',array('id'=>$model->id)),
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
                                                 $("#avtarimg").attr("src","'.Yii::app()->request->baseUrl.'/avtar/'.$model->user_id.'_"+file.name)
                                                $("<a id= closure class=trasher />").text(file.name).appendTo("#bfiles");
                                                $("<i class= \"icon-trash\"></i>").appendTo(".trasher");
                                                $("#TrainerDetails_avtar").css("display","none");
                                                $("#avtar").val("'.$model->user_id.'_"+file.name);
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
                    <?php //echo $form->textFieldControlGroup($model,'street',array('span'=>5,'maxlength'=>255)); ?>
                    <input type="hidden" id="TrainerDetails_street" name="TrainerDetails[street]" value="<?php if($model->street){echo $model->street ;}?>">
                      <?php echo $form->labelEx($model,'street'); ?>
                    <input type="text" maxlength="255" id="street" name="street" data-provide="typehead">
                      <?php 
//                      $this->widget('yiiwheels.widgets.typeahead.WhTypeAhead', array(
//                                'name' => 'asas',
//                                'pluginOptions' => array(
//                                'name' => 'test',
//                                   
//                                'source' => 'js:function(query, process){
//                                           $.ajax({
//                                            url:"'.CController::createUrl("site/localitytype").'",
//                                            type:"GET",
//                                            data:"term="+query,
//                                            datatype:"JSON",
//                                             success:function(results){
//                                             var items = new Array;
//                                               var newww=  JSON.parse(results);
//                                              $.map(newww, function(data){
//                    var group;
//                    group = {
//                        id: data.id,
//                        name: data.label,    
//                        value: data.value,
//                        toString: function () {
//                            return JSON.stringify(this);
//                            console.log(this);
//                            //return this.app;
//                        },
//                        toLowerCase: function () {
//                            //console.log(this)
//                            return this.name.toLowerCase();
//                        },
//                        indexOf: function (string) {
//                            return String.prototype.indexOf.apply(this.name, arguments);
//                        },
//                        replace: function (string) {
//                            var value = "";
//                            value +=  this.name;
//                            if(typeof(this.level) != "undefined") {
//                                value += " <span class=\"pull-right muted\">";
//                                value += this.level;
//                                value += "</span>";
//                            }
//                            return String.prototype.replace.apply("<div style=\"padding: 10px; font-size: 1.5em;\">" + value + "</div>", arguments);
//                        }
//                    };
//                    items.push(group);
//                });
//               return process(items);
//                                                }
//                                            })     
//                                           
//                                        }',
//                                    ' property'=> 'label',
//                                    'select'=>'js:function(item){alert(item)}',
//                                    
//                                )
//                                ));
                      
                      ?>
                          <?php 
//                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//            'name'=>'street',
//           'source'=>'js: function(request, response) {
//                       $.ajax({
//                           url: "'.$this->createUrl('site/localitytype').'",
//                           dataType: "json",
//                           data: {
//                               term: request.term,
//                               type: $("#TrainerDetails_city_id").val()
//                           },
//                           success: function (data) {
//                                    if(data){
//                                     $(".error").css("display","none");
//                                   response(data);
//                                   console.log(data)
//                                   }else{
//                                  $(".error").css("display","block");
//                                   $("#street").val("other");
//                                    }
//                                   
//                           },
//                           error: function (errordata) {
//                                 $(".error").css("display","none");
//                           }
//                       })
//                        }',
//                    'options' => array(
//                                    'minLength' => '1',
//                                        'select' => 'js: function(e,u){
//                                               var Item_id = u.item["id"];
//                                              $(this).val(Item_id);
//                                              $("#TrainerDetails_street").val(Item_id);
//                                                }'
//                                        ),
//                                   'htmlOptions' => array(
//                                        'placeholder' => 'Type the location'
//                                            ),
//                                        ));
 ?>
                <div class="error" style="display: none;color: red;">Please select only suggested value</div>
                <?php 
//            if($model->city){
//                echo $form->dropDownListControlGroup($model,'city_id',Citylist::model()->getCityuserDropDown(),array('span'=>5,'maxlength'=>255));
//            }else{
//                echo $form->dropDownListControlGroup($model,'city_id',Citylist::model()->getCityuserDropDown(),array('span'=>5,'maxlength'=>255));
//            }
            
            ?>
               <?php echo $form->textFieldControlGroup($model, 'fees', array('prepend' => 'Rs.','maxlength'=>8,'maxlength'=>255)); ?> 
            <?php echo $form->textFieldControlGroup($model,'pincode',array('span'=>5,'maxlength'=>255)); ?>
                
             <?php echo $form->dropDownListControlGroup($model, 'gender',array('1'=>'Male','0'=>'Female'), array('options' => array('1'=>array('selected'=>true))));  ?>   
            <?php // echo $form->textFieldControlGroup($model,'fees',array('span'=>5,'maxlength'=>255)); ?>
            <?php echo $form->textFieldControlGroup($model,'tot_exp',array('span'=>5,'maxlength'=>255)); ?>
                <?php echo $form->textFieldControlGroup($model,'certification_1',array('span'=>5,'maxlength'=>40,'required' => true,)); ?>
                <?php echo $form->textFieldControlGroup($model,'certification_2',array('span'=>5,'maxlength'=>40)); ?>
                <?php echo $form->textFieldControlGroup($model,'emp_2',array('span'=>5,'maxlength'=>40)); ?>
                <?php echo $form->textFieldControlGroup($model,'exp_2',array('span'=>5,'maxlength'=>3)); ?>
                <?php echo $form->textFieldControlGroup($model,'fb_link',array('span'=>5)); ?>
            
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
        <?php echo TbHtml::linkbutton('Cancel',array('url'=> Yii::app()->createUrl('Admin/Traineradmin'), 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>    
    </div>
        </div>    
    <?php $this->endWidget(); ?>

</div><!-- form -->
<style>
    .span-6 img{
        margin-top:20px;
        margin-bottom:10px;
    }
     .ui-autocomplete-input{
        width: 97% !important;
    }
    button.ui-datepicker-trigger{display: none}
    .icon-trash{margin: 3px 0 0 5px; cursor: pointer}
    #closure:hover{text-decoration:none}
    .dropdown-menu{z-index: 1051;}
</style>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/citycombo.js"></script>
<script>
    $(document).ready(function(){

        var cityid = "<?php echo $model->city_id;?>";
       var streets = "<?php echo $model->locality->locality; ?>";
        $(document).on('click','.icon-calendar',function(){  
           $(this).parents('.input-append').find('#TrainerDetails_dob').click();
           $(this).parents('.input-append').find('#TrainerDetails_dob').focus();
        });
         $('#TrainerDetails_dob').bind('focus click ',function(){  
             $(this).find('.icon-calendar').click();
             
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
        
         $("#street").typeahead({
     source: function(query, process){
                var cittyy = $('#TrainerDetails_city_id').val();
                $.ajax({
                    url:"<?php echo CController::createUrl('site/localitytype'); ?>",
                    type:'GET',
                    data:'term='+query+'&type='+cittyy,
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
    minLength: 2,
   updater: function (item) {
        var item = JSON.parse(item);
        $('#TrainerDetails_street').val(item.id);       
        return item.name;
    }
});
    })
</script>