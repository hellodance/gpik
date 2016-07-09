<?php
$this->breadcrumbs=array(
	'TrainerClientMsg'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Guide', 'url'=>array('index')),
	array('label'=>'Create Guide', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#guide-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Trainer Client Message</h1>
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'type' => 'striped bordered',
        'responsiveTable' => true,
	'id'=>'guide-grid',
	'dataProvider'=>$model->notifysearch(),
//	'filter'=>$model,
       
        'columns'=>array( 
		array('name'=>'id','filter'=>FALSE),
                array('type'=>'raw','name'=>'Reciever','value'=>'$data[Recipientemail ]','filter'=>FALSE),
                array('type'=>'raw','name'=>'Sender','value'=>'$data[Senderemail]','filter'=>FALSE),
                array('name'=>'message','filter'=>FALSE),
		'senddate',
		array(
                        'class'=>'yiiwheels.widgets.grid.WhToggleColumn',
                        'toggleAction'=>array('admin/notifytoggle','id'=>'$data[id]'),
                        'checkedButtonLabel'=>'Active',
                        'uncheckedButtonLabel'=>'Inactive',    
                        'name' => 'status',
                        ),
                                    array(
                                               'header' => 'Action',
                                               'class'=>'bootstrap.widgets.TbButtonColumn',
                                               'template' => '{assign}',
                                               'buttons' => array(
                                                   'assign'=>array(
                                                        'url' => 'Yii::app()->controller->createUrl("admin/assigntrainer",array("id"=>$data[id]))',
                                                        'label' => 'Assign Trainer',
                                                        'click'=>"function(){
                                                                    $.fn.yiiGridView.update('guide-grid', {
                                                                        type:'POST',
                                                                        url:$(this).attr('href'),
                                                                        success:function(data) {
                                                                              $.fn.yiiGridView.update('guide-grid');
                                                                        }
                                                                    })
                                                                    return false;
                                                                  }
                                                                ",
                                                        'options' => array('confirm' => 'Are you sure? You want to assign client to this trainer?',
                                                                           'class'=>'btn btn-success btn-success',
                                                                     ),
                                                        'visible'=>'$data[reqtojoin]=="1"',
                                               ),
                                                  
                                                ),

                                                
                                            ),
//            array(
//                                                        'name'  => 'assign',
//                                                        'type'  => 'raw',
//                                                        'value' => TrainerClientMsg::model()->getAssigned('$data["id"]'),
//                                                        'htmlOptions' => array('id' => 'completestatus')
//                                                    ),
            )
		
        )); ?>