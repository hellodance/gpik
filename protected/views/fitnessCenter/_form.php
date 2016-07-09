<?php
/* @var $this FitnessCenterController */
/* @var $model FitnessCenter */
/* @var $form TbActiveForm */
?>
<style>
    #FitnessCenter_address, #FitnessCenter_speciality {resize: none !important;}
        /*#FitnessCenter_custom_type{display: none;}*/
</style>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'fitness-center-form',
//        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,

    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true, // allow client validation for every field
    ),
    'htmlOptions'=>array(
//            'class' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    ),
)); ?>
<div class="span-6">
    <!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
    <?php   $fitnesstype = array('Gym/Fitness club','Aerobics classes','Yoga Centre','Martial arts','Dance Academy','Sports club','Other');
    $gender = array(0=>'Female',1=>'Male',2=>'Unisex');
    $payments = array();
    $payments=  array(1=>'Visa',2=>'Amex',3=>'Master Card',4=>'Cash',5=>'Cheque/ Draft');
    $tags = Facilities::model()->findAllByAttributes(array('status'=>1));
    $facilities = array();
    foreach($tags as $tag){
        $facilities[]= $tag->name;
    }
    if($model->pay_method){
        $pay = explode(',', $model->pay_method);
        foreach ($pay as $key=>$pairval)
            if ($pairval) {
                $options[$pairval] = array('selected' => 'selected');
            }
    }
    ?>
    <?php //echo $form->errorSummary($model); ?>
    <ul class="user-detail">
        <li><?php echo $form->textFieldControlGroup($model,'name',array('span'=>4,'maxlength'=>255)); ?></li>
        <li><?php echo $form->labelEx($model,'type');
            $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
                'asDropDownList' => false,
                'model'=>$model,
                'attribute' => 'type',
                'pluginOptions' => array(
                    'tags' => $fitnesstype,
                    'placeholder' => 'Type',
                    'required'=>true,
                    'width' => '100%',
                    'tokenSeparators' => array(',', ' ')
                ),
                'htmlOptions'=>array('style'=>'width:50%;')
            ));
            ?></li><li>&nbsp;</li>
        <!--<li><?php // echo $form->dropDownListControlGroup($model,'type',$fitnesstype,array('span'=>5)); ?></li>-->
        <li><label>If Not in list,Please Mention</label><?php echo $form->textField($model,'custom_type',array('span'=>4,'placeholder'=>'Please Enter Type')); ?></li>
        <li><?php echo $form->textFieldControlGroup($model,'url',array('prepend' => "http://",'span'=>3,'width'=>'100px')); ?></li>
        <li><?php echo $form->textFieldControlGroup($model,'address',array('span'=>4,'width'=>'100px')); ?></li>
        <li><?php echo $form->textFieldControlGroup($model,'address2',array('span'=>4,'width'=>'100px')); ?></li>
        <!--<li id="other_area" style="display:none;"><?php /*echo $form->textFieldControlGroup($model,'address2',array('rows'=>3,'span'=>4,)); */?></li>-->
        <li><?php
            //            echo $form->dropDownListControlGroup($model, 'city_id',Citylist::model()->getCityuserDropDown(), array(
            //                                                                    'ajax' => array(
            //                                                                            'type'=>'POST', //request type
            //                                                                            'url'=>CController::createUrl('site/dynamicstreet'), //url to call.
            //                                                                            //Style: CController::createUrl('currentController/methodToCall')
            //                                                                            'update'=>'#TrainerDetails_street',
            //                                                                            //'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
            //                                                                            //'data'=>'js:javascript statement'
            //                                                                            //leave out the data key to pass all form values through
            //                                                                            )
            //                        ));
            ?>
            <div class="control-group">
                <label class="control-label" for="FitnessCenter_city_id">City</label>
                <div class="controls">
                    <select id="FitnessCenter_city_id" name="FitnessCenter[city_id]"></select>
                </div>
            </div>

        </li>
        <li><?php // echo $form->textFieldControlGroup($model,'area',array('span'=>5,'maxlength'=>255)); ?>
        <li>
            <label>State</label>
            <?php echo TbHtml::textFieldControlGroup('state', $model->city->state);  ?>
        </li>
        <input type="hidden" id="FitnessCenter_area" name="FitnessCenter[area]" value="<?php if($model->area){echo $model->area ;}?>">
        <?php echo $form->labelEx($model,'area'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'street',
            'source'=>'js: function(request, response) {
                       $.ajax({
                           url: "'.$this->createUrl('site/localitytype').'",
                           dataType: "json",
                           data: {
                               term: request.term,
                               type: $("#FitnessCenter_city_id").val()
                           },
                           success: function (data) {
                                    if(data){
                                     $(".error").css("display","none");
                                   response(data);
//                                   console.log(data)
                                   }else{
//                                  $(".error").css("display","block");
//                                   $("#street").val("other");
                                    }
                                   
                           },
                           complete:function(data){
                           if(data.responseText == "other")
                                  $.ajax({
                                            url: "'.$this->createUrl('site/localitytypenull').'",
                                            dataType: "json",
                                            data: { type: $("#FitnessCenter_city_id").val()},
                                            success: function (data) {
                                                        if(data){
                                                         $(".error").css("display","none");
                                                          $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
                                                       response(data);
                                                       }else{
//                                                      $(".error").css("display","block");
//                                                       $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
//                                                       $("#street").val("");
                                                        }

                                               },
                                                complete:function(data){
                                                            console.log(data.responseText);
                                                            $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
                                                            }

                                        });
                          
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
                                              $("#FitnessCenter_area").val(Item_id);
                                                }'
            ),
            'htmlOptions' => array(
                'placeholder' => 'Type the location'
            ),
        ));
        ?>
        <div class="error" style="display: none;color: red;">Please select only suggested value</div>


        </li>

        <li><?php echo $form->textFieldControlGroup($model,'pincode',array('rows'=>3,'span'=>4,)); ?></li>
        <li><?php echo $form->textFieldControlGroup($model,'floors',array('rows'=>3,'span'=>4)); ?></li>



    </ul>
</div> <div class="span-6">
    <ul class="user-detail user-d1">
        <li><?php echo $form->textFieldControlGroup($model,'phone',array('span'=>4)); ?></li>

        <li><?php echo $form->label($model,'facilities');
            $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
                'asDropDownList' => false,
                'model'=>$model,
                'attribute' => 'facilities',
                'pluginOptions' => array(
                    'tags' => $facilities,
                    'placeholder' => 'Facilities',
                    'width' => '100%',
                    'tokenSeparators' => array(',', ' ')
                )));
            ?>
        </li><br />
        <li><?php echo $form->textFieldControlGroup($model,'total_trainers',array('span'=>4)); ?></li>

        <li><?php if(isset($model->gender)){
                echo $form->dropDownListControlGroup($model,'gender',$gender,array('span'=>4,));
            }else{
                echo $form->dropDownListControlGroup($model,'gender',$gender,array('span'=>4,'options' => array('2'=>array('selected'=>true))));
            } ?></li>
        <li><?php echo $form->textAreaControlGroup($model,'speciality',array('rows'=>3,'span'=>4)); ?></li>

        <li><?php echo $form->textFieldControlGroup($model,'mem_fee',array('prepend' => "Rs.",'span'=>4,'maxlength'=>6)); ?></li>
        <li><?php echo $form->textFieldControlGroup($model,'reg_fee',array('prepend' => "Rs.",'span'=>4,'maxlength'=>6)); ?></li>
        <li><?php echo $form->dropDownListControlGroup($model,'pay_method', $payments, array('multiple' => true,'options' => $options)); ?></li>
        <li style="float: right;width: 200px;">
            <?php echo $form->label($model,'timings_close');
            $this->widget('yiiwheels.widgets.timepicker.WhTimePicker', array(
                'model' => $model,
                'name' => 'FitnessCenter[timings_close]',
                'attribute'=>'timings_close',
                'pluginOptions'=>array('template'=>'dropdown',),
                //'value'=>'15:00',
            ));
            ?>

        </li>
        <li style="float: left;width: 200px;">
            <?php echo $form->label($model,'timings_open');
            $this->widget('yiiwheels.widgets.timepicker.WhTimePicker', array(
                'model' => $model,
                'name' => 'FitnessCenter[timings_open]',
                'attribute'=>'timings_open',
                //'value'=>'15:00',
            ));?>
        </li><li>
            &nbsp;
        </li>

        <li><?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
            &nbsp;
            <?php
            echo TbHtml::linkButton('Cancle',
                array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'size'=>TbHtml::BUTTON_SIZE_LARGE,
                    'url'   => Yii::app()->createUrl('FitnessCenter/admin'),
                ));
            ?>
        </li>
    </ul>
</div>

<?php $this->endWidget(); ?>
</div>
<script>
    $(document).ready(function(){
        /* $(document).on('change','#FitnessCenter_type',function(){
         if($(this).val() == 7){
         $('#FitnessCenter_custom_type').css('display','block');
         }else{$('#FitnessCenter_custom_type').css('display','none');}
         });*/
        var other_area = "<?php echo $model->address2;?>";
        if(other_area){
            $('#other_area').css('display','block');
        }
        $('#street').bind("change paste keyup", function(event) {
            X = event.target.value;
            if (X == 'other') {
                $('#other_area').css('display','block');
            }else{
                $('#other_area').css('display','none');}
        });



        var cityid = "<?php echo $model->city_id;?>";
        var streets = "<?php echo $model->locality->locality; ?>";

        if(cityid){
            $.combos('#FitnessCenter_city_id',{
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

        }else{
            $.combos('#FitnessCenter_city_id',{
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




    })
    </script>
    <style>
        .ui-autocomplete{
            width: 215px;
        }     
.select2-container-multi .select2-choices {
    
    width: 100%;
}
.dropdown-menu{z-index: 2;}
        .select2-container-multi .select2-choices {
    height: 10px;
    
    width: 365px;
}
.select2-drop{
    width: 365px !important;
}
#FitnessCenter_url{width: 302px !important;}
#FitnessCenter_mem_fee, #FitnessCenter_reg_fee{width: 330px !important;}
 #FitnessCenter_timings_open, #FitnessCenter_timings_close{width: 155px !important;}

    .select2-container-multi .select2-choices {

        width: 100%;
    }
    .dropdown-menu{z-index: 2;}
    .select2-container-multi .select2-choices {
        height: 10px;

        width: 365px;
    }
    .select2-drop{
        width: 365px !important;
    }
    #FitnessCenter_url{width: 302px !important;}
    #FitnessCenter_mem_fee, #FitnessCenter_reg_fee{width: 330px !important;}
    #FitnessCenter_timings_open, #FitnessCenter_timings_close{width: 155px !important;}

</style>
