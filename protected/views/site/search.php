<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider'=>$model->trainsearch(),
    'itemView'=>'_view',
    'template' =>"{items}\n<div class=\"row-fluid\"><div class=\"span6\">{pager}</div><div class=\"span6\">{summary}</div></div>",
    'viewData'=>array('page'=>$page),
    'itemsTagName'=>'table',
    //'itemsCssClass'=>'items table table-striped table-condensed',
    'emptyText'=>'<i> Sorry, there are no active items to display</i>',
    'summaryText'=>''
                  )); 

?>
<script>
$(document).ready(function(){
        $(document).on('click','.box_wrapper',function(){
        var avtarimgrand= $(this).find('.imgBox a img').attr('src');
        $.session.set("avtarimg",avtarimgrand);
 });
})
</script>
       