<div class="modal-body">
    <div class="row2 search-step">
    	<ul>
            <li class="active"><a class="step1" href="#"></a></li>
            <li><a class="step2" href="#"></a></li>
            <li><a class="step3" href="#"></a></li>
        </ul>
    </div>
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'search-form',
        'action'=>Yii::app()->createUrl('site/search'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        
));
    $metro =array(428=>'Bangalore',29=>'Hyderabad',278=>'Delhi',596=>'Mumbai',999999=>'Other');
    ?>
    
    <div id="step1">
        <!--<div class="row2"> <a href="#" id="stepimg1" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step01.gif" alt="" id="stepimg1" /></a> </div>-->
        <ul class="login">
            <li>
                <label>City</label>
                <?php echo TbHtml::dropDownListControlGroup('city_id', 'city_id',$metro, array(
                                                                    'ajax' => array(
                                                                            'type'=>'POST', //request type
                                                                            'url'=>CController::createUrl('site/dynamicstreet'), //url to call.
                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'update'=>'#street',
                                                                           'success'=>'js:function(resp){
                                                                               
//                                                                               var typeaheadSource = $("#hiddenlocality").html();
//                                                                               getlocals($("#city_id").val())
//                                                                               function getlocals(id){
//                                                                                    $.ajax({
//                                                                                          type:"GET",
//                                                                                          async: "false",
//                                                                                          data :{id:id }, 
//                                                                                          url: "'.CController::createUrl("site/localitytype").'", 
//                                                                                          success:function(resp){
//                                                                                                            $("#hiddenlocality").html(resp);
//                                                                                                            $("#street").typeahead({
//                                                                                                            ajax: "'.CController::createUrl("site/localitytype").'", 
//                                                                                                                
//                                                                                                                    });
//                                                                                                           }, 
//                                                                                                });
//                                                                                              }
                                                                                }', //selector to update
                                                                            //'data'=>'js:javascript statement' 
                                                                            //leave out the data key to pass all form values through
                                                                            )
                        ));  ?>
            </li>
            <li>
                <label>Locality</label>
                    <input type="hidden" id="street_search" name="street" >
                 <input type="text" maxlength="255" id="street" data-provide="typehead">
                <!--<input type='text' class='ajax-typeahead' data-link='<?php //echo $this->createUrl("site/localitytype"); ?>' />-->
                
<!--                <input id="street">
                <div id="hiddenlocality" style="display: none"></div>-->
                <?php 
//                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//            'name'=>'street',
//           'source'=>'js: function(request, response) {
//                       $.ajax({
//                           url: "'.$this->createUrl('site/localitytype').'",
//                           dataType: "json",
//                           data: {
//                               term: request.term,
//                               type: $("#city_id").val()
//                           },
//                           success: function (data) {
//                                    if(data){
//                                     $(".error").css("display","none");
//                                     
//                                   response(data);
//                                   }else{
////                                  $(".error").css("display","block");
////                                 
////                                   $("#street").val("");
//                                    }
//                                   
//                           },
//                           complete:function(data){
//                           if(data.responseText == "other")
//                                  $.ajax({
//                                            url: "'.$this->createUrl('site/localitytypenull').'",
//                                            dataType: "json",
//                                            data: { type: $("#city_id").val()},
//                                            success: function (data) {
//                                                        if(data){
//                                                         $(".error").css("display","none");
//                                                          $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
//                                                       response(data);
//                                                       }else{
////                                                      $(".error").css("display","block");
////                                                       $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
////                                                       $("#street").val("");
//                                                        }
//
//                                               },
//                                                complete:function(data){
//                                                            console.log(data.responseText);
//                                                            $("ul.ui-autocomplete").prepend("<li><b>Do you mean?</b></li>")
//                                                            }
//
//                                        });
//                          
//                            },
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
//                                                }'
//                                        ),
//                                   'htmlOptions' => array(
//                                        'placeholder' => 'Type the location'
//                                            ),
//                                        ));
 ?>
                <div class="error" style="display: none;color: red;">Please select only suggested value</div>
                <?php 
                ?>
                 <?php // echo CHtml::dropDownList('street','', array());
                 //// echo TbHtml::dropDownListControlGroup('street', 'street', Locality::model()->getlocalityDropDown(), array('prompt'=>'Select Locality',
//                                                                    'ajax' => array(
//                                                                            'type'=>'POST', //request type
//                                                                            'url'=>CController::createUrl('site/dynamicstates'), //url to call.
//                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
//                                                                            //'data'=>'js:javascript statement' 
//                                                                            //leave out the data key to pass all form values through
//                                                                            )
//                        ));  ?>
            </li>
            <li>
                <div class="column2">
                    <button class="btn btn-primary stepone">Next</button>      
                </div>
            </li>
        </ul>
    </div>
    <div id="step2" style="display: none">
        <!--<div class="row2"> <a href="#" id="stepimg2"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step02.gif" alt="" id="stepimg2" /></a> </div>-->
        <ul class="login">
            <li>
                <label>Preference</label>
               <?php echo TbHtml::dropDownListControlGroup('gender', 'gender',array('1'=>'Male','0'=>'Female','2'=>'Any'), array('options' => array('2'=>array('selected'=>true))));  ?>
            </li>
            <li>
                <label>Type</label>
                <?php echo TbHtml::dropDownListControlGroup('search_type_id', 'type_id', TrainerDetails::model()->gettrainerDropDown(), array(
//                                                                    'ajax' => array(
//                                                                            'type'=>'POST', //request type
//                                                                            'url'=>CController::createUrl('site/dynamicstates'), //url to call.
//                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
//                                                                            //'data'=>'js:javascript statement' 
//                                                                            //leave out the data key to pass all form values through
//                                                                            )
                        ));  ?>
            </li>
            <li>
                <div class="column2">
                    <input class="btn btn-primary" name="back" type="button" id="sback" value="Back" />
                    <button class="btn btn-primary steptwo">Next</button>
                    
                </div>
            </li>
        </ul>
    </div>
    <div id="step3" style="display: none">
        <!--<div class="row2"> <a href="#" id="stepimg3" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/step03.gif" alt="" id="stepimg3" /></a> </div>-->
        <ul class="login">
            <li>
                <label>How often you need fitness professional?</label>
             <?php   echo TbHtml::dropDownListControlGroup('frequency', 'frequency_id', Frequency::model()->getfrequency(), array(
//                                                                    'ajax' => array(
//                                                                            'type'=>'POST', //request type
//                                                                            'url'=>CController::createUrl('site/dynamicstates'), //url to call.
//                                                                            //Style: CController::createUrl('currentController/methodToCall')
//                                                                            'success'=>'js:function(resp){$("#states").val(resp);}', //selector to update
//                                                                            //'data'=>'js:javascript statement' 
//                                                                            //leave out the data key to pass all form values through
//                                                                            )
                        ));?>
            </li>
            <li>
                <p>Do you need a diet consultation?</p>
                <?php echo TbHtml::radioButtonList('dietician', '1',array('1'=>'Yes','2'=>'No'));  ?>
           </li>
            <li>
                <div class="column2">
                    <input class="btn btn-primary" name="back" type="button" id="tback" value="Back" />
                    <input class="btn btn-primary" name="Submit" type="submit" id="Submit" value="Search" />
                    
                </div>
            </li>
        </ul>
    </div>
    <?php $this->endWidget(); ?>
  </div>
<script>
$(document).ready(function(){
        
        $(document).on('click','.search-step ul li',function(e){
         $('.search-step ul li.active').removeClass('active');   
         $(this).addClass('active');
         var steps = $(this).find('a').attr('class');
         if(steps == 'step1'){
        $('#step1').css('display','block');
        $('#step2').css('display','none');
        $('#step3').css('display','none');
         } else if(steps == 'step2'){
        $('#step2').css('display','block');
        $('#step1').css('display','none');
        $('#step3').css('display','none');
         }
          else if(steps == 'step3'){
       $('#step3').css('display','block');
        $('#step2').css('display','none');
        $('#step1').css('display','none');
         }
    });
        $(document).on('click','.stepone',function(e){
        e.preventDefault();
        $('.search-step ul li.active').removeClass('active');  
        $('.search-step').find('.step2').parent('li').addClass('active');
        $(this).parents('#step1').css('display','none');
        $('#step1').next('#step2').css('display','block');
    });
        $(document).on('click','.steptwo',function(e){
        e.preventDefault();
        $('.search-step ul li.active').removeClass('active');  
        $('.search-step').find('.step3').parent('li').addClass('active');
        $(this).parents('#step2').css('display','none');
        $('#step2').next('#step3').css('display','block');
    })
        $(document).on('click','#sback',function(e){
        $('.search-step ul li.active').removeClass('active');  
        $('.search-step').find('.step1').parent('li').addClass('active');
        $('#step1').css('display','block');
        $('#step1').next('#step2').css('display','none');
    });
        $(document).on('click','#tback',function(e){
        $('.search-step ul li.active').removeClass('active');  
        $('.search-step').find('.step2').parent('li').addClass('active');
        $('#step2').css('display','block');
        $('#step2').next('#step3').css('display','none');
    });
     $('ul.dropdown-menu li').click(function(){
      var selectedval = $(this).attr('val');
      $('#search_type_id').val(selectedval);
    })
/*     $('.ajax-typeahead').typeahead({
            source: function(query, process) {
                return $.ajax({
            url: $(this)[0].$element[0].dataset.link,
            type: 'get',
            data: {term: query},
            dataType: 'json',
            success: function(json) {
            if(json)    
            return typeof json == 'undefined' ? false : process(json);
            else{
                console.log('please retry');
                }
            }
        });
            },
            property: 'value'

});*/
//    $.ajax({
//            type:'POST', //request type
//            data :{city_id: 428 }, //city id for banglore
//            url: '<?php // echo CController::createUrl('site/dynamicstreet') ?>', 
//            success:function(resp){
//                            $("#street").html(resp);
//                            $("#UserDetails_street").html(resp);
//                        }, //selector to update
//             }); 
//$("#street").typeahead({
//    onSelect: function(item) {
//        console.log(item);
//    },
//     ajax: '<?php //echo CController::createUrl("site/localitytype") ?>', 
//      method: "get",
//      preDispatch: function (query) {
//            showLoadingMask(true);
//            return {
//                search: query
//            }
//            },
//                     preProcess: function (data) {
//            showLoadingMask(false);
//            if (data.success === false) {
//                // Hide the list, there was some error
//                return false;
//            }
//            return data.mylist;
//        }
//     });
    var city__id = $('#city_id').val();
     $("#street").typeahead({
     source: function(query, process){
                         city__id = $('#city_id').val();
                $.ajax({
                    url:"<?php echo CController::createUrl('site/localitytype'); ?>",
                    type:'GET',
                    data:'term='+query+'&type='+city__id,
                    datatype:'JSON',
                    
                    success:function(results){
                           var items = new Array;
                        var newww=  JSON.parse(results);
                              $.map(newww, function(data){
                                var group;
                        group = {
                         id: data.id,
                        name: data.label,    
                        value: data.name,                            
                        toString: function () {
                            return JSON.stringify(this);
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
                    },
                    
                
                });
     },
    property: 'name',
    items: 10,
    minLength: 2,
   updater: function (item) {
        var item = JSON.parse(item);
        $('#street_search').val(item.id);       
        return item.name;
    }
});
   
    
             
})
</script>
<style>
    .ui-autocomplete{
        width: 450px !important;
    }
     .dropdown-menu{z-index: 1051;}
</style>
 <!--<script src="bootstrap-typeahead.js"></script>-->
<!--<script src="<?php  echo Yii::app()->request->baseUrl ?>/js/bootstrap-typeahead.js"></script>-->

