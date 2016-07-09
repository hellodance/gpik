<?php foreach ($clients as $client){
    $masters[] = $client->user_id;
}

if ($messages) {
    foreach ($messages as $key => $message) {
        $clientsdetails = UserDetails::model()->findByAttributes(array('user_id'=>$message->from_sender));
                
        ?>

       <div class="accordion-group">
                        <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#mcollapse_<?php echo $message->id ?>"> <i class="icon-plus"></i><?php echo $clientsdetails->fname.' '.$clientsdetails->lname; ?> <span><?php echo $message->subject ;?></span></a></div>
                        <div id="mcollapse_<?php echo $message->id ?>" class="accordion-body collapse">
                          <div class="accordion-inner">
                            <p><?php echo $message->message ;?></p>
                            <p class="text-right"><a class="btn" href="#mail-box_<?php echo $clientsdetails->user_id?>" data-toggle="modal">Reply</a></p>
                            <?php 
                            if (!in_array($clientsdetails->user_id, $masters, true)){ ?>
                            <p class="text-left"><?php echo TbHtml::Button('Request Admin to Join',array('class'=>'ajaxjoin','id'=>$message->id,'data-id'=>$message->from_sender,'from_sender'=>Yii::app()->user->id,'data-msg'=>$message->message,'data-sub'=>$message->subject)); ?></p>
                                <?php }  ?>
                          </div>
                        </div>
                      </div>
                <?php }
            } else { ?>
    <legend> No Messages found in your archive. </legend><?php } ?>
    <style>
/*        .message_modal    {
            margin: -22% 0 0 -29%;
        }*/
    </style>
    <script>
    $(document).on('click','.ajaxjoin',function(){
        var user = $(this).attr('from_sender');
        var to = $(this).attr('data-id');
        var message = $(this).attr('data-msg');
        var sub = $(this).attr('data-sub');
        var uid = $(this).attr('id');
        requesttojoin(uid,sub,message,to,user);
     });
     
     
     
     
     
    function requesttojoin(id,subject,msg,to_sender,user_id){
        $.ajax({
            url:'<?php echo CController::createUrl("UserWorkouts/AssignClient"); ?>',
            type:'POST',
            data:{subject:subject,message:msg,user_id:to_sender,message:msg},
            success:function(response){
                    $('button#'+id).removeClass('ajaxjoin');
                    $('button#'+id).html('Thank you');
            },
           error:function(error){
                    console.log(error);
            }
            
        })}
    </script>

     