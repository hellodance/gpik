<!--------Enter Daily Meals Popup-------------->
<!--<div id="add-food" class="modal hide fade workout-modal calories">-->
<div class="ajaxload" style="display:none"><div style="" id="blockui"><div id="loaderimg" class=""><img align="middle" src="<?php echo Yii::app()->request->baseUrl ?>/images/loader.gif" valign="middle" style="left: 40%;position: relative;"></div></div></div>
<!--  <div class="modal-header">
  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Edit Meals</h3>
  </div>-->
<!--  <div class="modal-body">  -->
    <div class="column3"> 
        <h5><i><img src="<?php echo Yii::app()->request->baseUrl ?>/images/green-d-arrow.gif" alt="" /></i>What did you eat today?</h5>
       <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'food-intake-edit-form',
        'action'=>array('TrainerDetails/editfood','id'=>$food->id),
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-inline'),
)); $size =  array();
       for($i=1;$i <= 10;$i++) {
  $size[$i]=$i ; 
  }
  $mealtype = array(1=>'Breakfast',2=>'Morning Snack',3=>'Lunch',4=>'Afternoon Snack',5=>'Dinner',6=>'Evening Snack');
       ?>
        <input type="hidden" id="hiddenfoodtypeid" name="foodtypeid" value="">
        <input type="hidden" id="foodid" name="foodid" value="">
        
        <ul>
        	<li>
                    <?php  
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name' => 'foods1',
//                  'model' => $order,
                    'value' =>$food->name,
                    'sourceUrl' => array('site/Foddies'),
                    'options' => array(
                                'minLength' => '2',
                                'select' => 'js: function(e,u){
                                    var Item_id = u.item["id"];
                                    var type_id = u.item["typeid"];
                                  $("#hiddenfoodtypeid").val(type_id);
                                  $("#foodid").val(Item_id);
                                       }',
                                'open' => 'js:function(event, ui){

                                    $("ul.ui-autocomplete li a").each(function(){
                                   // var htmlString = $(this).html().replace(/,/g, "<br>");
                                   // htmlString = htmlString.replace(/,/g, "<br>");
                                   // $(this).html(htmlString);

                                    });}',
                                'success' => 'js:function(event,resp){
                                    
                                    }',
            ),
            'htmlOptions' => array(
//                'size' => 45,
//                'maxlength' => 45,
//                'disabled'=>'disabled',
                'class' => 'food-type',
                'id' => 'search-fooditems',
//                'value' => 'e. g. full arms',
//                'onblur'=>"if(this.value==''){this.value='e.g.Bycycle'}", 
//                'onclick'=>"if(this.value=='e.g.Bycycle'){this.value=''}"
            ),
        ));?>
            	<!--<input type="text" class="exer-type" placeholder="">-->                    
                <button type="submit" class="btn" disabled="true" id="updatefoodentry">Update Entry</button>
            </li>
            
            <li>
            	<label>Serving Size</label>
                <?php echo TbHtml::dropdownList('mealsize', $food->mealsize, $size); ?>
                <label>Meal Type</label>
                <?php echo TbHtml::dropdownList('mealtype', $food->mealtype, $mealtype); ?>
            </li>
            <li>
            	
                <label>Date</label>
                <div class="input-append">
                            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
//                                                                    'model'=>$details,
//                                                                    'attribute' => 'dob',
                                                                    'name'=>'mealdate',
                                                                    'value'=>  date('m/d/Y'),
                                                                    'pluginOptions' => array(
                                                                    'format' => 'mm/dd/yyyy',
                                                                        'startDate'=> '-15d',
                                                                        'endDate'=> '+0d',
                                                                     'orientation'=>'top left',
                                                                     'showOn'=> 'both',
                                                                     
                                                                    ),'htmlOptions'=>array('orientation'=>'top-left','required'=>true)
                                                                    ));
                                                                    ?>
                            <span class="add-on"><icon class="icon-calendar"></icon></span>
                                                       
                            </div>
                
            </li>
        </ul>
        <?php $this->endWidget();?>
        
    </div>    
    <div class="column4">
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#add3" data-toggle="tab">Food Journal</a></li>
                <li><a href="#add4" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="add3">
                     <?php   echo TbHtml::dropDownListControlGroup('food_id','food_id[]',  Foodtype::model()->getfoodDropDown(), array('prompt'=>'Select a food group',
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/fooditems'), //url to call.
                                                                            'beforeSend'=>'js:function(){
                                                                                $("#foodies").html($(".ajaxload").html());
                                                                                }',
                                                                            //Style: CController::createUrl('currentController/methodToCall')
                                                                            'update'=>'#foodies',
                                                                            'success'=>'js:function(data){
                                                                                $("#foodies").html(data);
                                                                                }',
//                                                                            'success'=>'js:function(resp){}', //selector to update
                                                                             'data'=>'js:{foodid:$(this).val()}',
                                                                            //leave out the data key to pass all form values through
                                                                            ),
                                                                    'id'=>'available_food_groups_edit',
                                                                    'class'=>'select',
                        )); ?>
                <ul id="foodies" class="workout-list"></ul>
                </div>
                
            	<div class="tab-pane" id="add4">
                	 <?php if($allfoods){ ?>
                    <ul id="recworkouts" class="workout-list">
                      <?php  
                      foreach($allfoods as $modelw){ ?>
                       
                	<li><a href="#" food="<?php echo $modelw->fooditem_id; ?>" foodtypeid="<?php echo $modelw->foodtype_id; ?>" class="fooditem" id="fooditem_<?php echo $modelw->fooditem_id; ?>"><?php echo $modelw->name; ?></a></li>
                      <?php }?>
                        </ul>
                    <?php }else { echo 'No Recent item available.';}?>
                </div>
            </div>
        </div>
    </div>
<!--  </div>-->
<!--    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="foodsub" data-toggle="modal" role="button" href="#">Submit</a> </div>-->
<!--  <div class="modal-footer">
    <button data-dismiss="modal" class="btn">Cancel</button>
    <a href="#first-reg1" role="button" data-toggle="modal" class="btn btn-primary">Submit</a> </div>-->
<!--</div>-->
<!--------End of Enter Daily Meals------------->