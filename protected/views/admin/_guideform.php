<?php
/* @var $this GuideController */
/* @var $model Guide */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'guide-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>

            <?php //echo $form->textFieldControlGroup($model,'article',array('span'=>5)); ?>

            <?php //echo $form->textfieldControlGroup($model,'thumb',array('rows'=>6,'span'=>8)); ?>
            <div class="user-row">
                     <?php /*if($model->thumb){ ?><input type="hidden" name="newGuideImage" value="<?php echo $model->thumb ?>" ><?php }*/ ?>   
                     <?php  if($model->thumb){ ?><img src="<?php echo  Yii::app()->request->baseUrl.'/guide/'.$model->thumb?>" alt="" class="sab" height="70" width="70" />
                     <?php }else{ ?><img src="<?php echo  Yii::app()->request->baseUrl?>/images/no-image.gif" alt="" class="sab" />                      <?php } ?>
                      <ul>
                        <li>
                            <div id="bfiles" class="files"></div>
                            <input type="hidden" name="guideThumb" id="guideThumb" >
                        <?php
                        $this->widget(
                                'yiiwheels.widgets.fileupload.WhBasicFileUpload', array(
                            'model'=>$model,
                            'attribute' => 'thumb',
                                    
                            'uploadAction' => $this->createUrl('admin/saveguideimg'),
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
                                                 $("#guideThumb").val(file.name);
                                                $("<a id= closure/>").text(file.name).appendTo("#bfiles");
                                                $(".sab").attr("src",file.thumbnailUrl);
                                                $("#Guide_avtar").css("display","none");
                                                $(document).on("click","#closure", function(){
                                                    $("#Guide_avtar").css("display","inline");
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
            <?php echo $form->textfieldControlGroup($model,'excerpt',array('rows'=>6,'span'=>8)); ?>
                <div style="position:relative" class="">
                             <?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array(
                                'model'=>$model,
                                'attribute' => 'article',
                                'pluginOptions'=>array('minHeight'=> 200,'width'=>80)
            ));?></div>
            <?php //echo $form->textFieldControlGroup($model,'author',array('span'=>5,'maxlength'=>255)); ?>

            <?php //echo $form->textFieldControlGroup($model,'date',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'rating',array('span'=>5,'maxlength'=>255)); ?>

            <?php //echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->