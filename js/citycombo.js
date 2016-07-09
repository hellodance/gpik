/* 
 * Combobox based Dropdown grouping by Cities
 * User: Sudhanshu Saxena <sudhanshu.s@rijitechsolutions.com>
 * Version 0.1
 */

(function($){
    $.combos = function(selector,settings){
        // variables
        var obj = $(selector);
        
        var config = { 'urls': '','vals':0 };
        
         if ( settings ){$.extend(config, settings);}
         
        $.ajax({
            url:config.urls,
            success:function(response){
                
            var groups = {
                1 : 'Top_Cities',
                2 : 'Others'
            };
            var optionsGroup1 = {
                278  : 'Delhi',
                428  : 'Bangalore',
                596  : 'Mumbai',
                817  : 'Chennai',
                145  : 'Kolkata',
                29   : 'Hydrabad',
            }
            var allcity = $.parseJSON(response);
            var optionsGroup2 = allcity;
            $.each(groups, function(groupIndex, groupText) { 
            $(obj).find("option:contains('+optionsGroup1+')").remove()
            $(obj).append('<optgroup label="'+groupText+'" id="'+groupText+'" class="optiongrp" />');
            $.each(eval('optionsGroup' + groupIndex), function (optionText, optionIndex) {
                $('#'+groupText).append(new Option(optionIndex,optionText));
                
            });
        });
        
        $(obj).val(config.vals);
        },
        error:function(res){
            console.log(res);
        }
        
    })
  return this;
    };
})(jQuery);
