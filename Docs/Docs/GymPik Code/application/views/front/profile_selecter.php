<link href="../../../css/gympik.css" rel="stylesheet" type="text/css" />
  <div id="sign_up">
    <table width="100%" border="0" cellspacing="16" cellpadding="0">
      <tr>
        <td class="popupTitle" align="left" valign="top">
		<?php echo validation_errors(); ?>
		<?php $attributes = array('class' => '', 'id' => 'fp','name'=>'fp','enctype'=>'multipart/form-data'); ?>
		<?php echo form_open('user/profile_selecter' ,$attributes); ?>
		
<?php $type 	= $data[0]->role == '1' ? 'user' : 'trainer';  ?>
<?php $type2 	= $data[1]->role == '1' ? 'user' : 'trainer';  ?>

	
	
	<div   style="width:400px; ">
	<h3>Please select user type</h3>
   <div style="width:45%; height:100%;float:left;">
   <ul style="margin:40px 40px;">
	   <li>
	   <span>
	   <img src="<?php echo base_url()?>images/user_icon.png" />
	   </br>  
	   </span>	   </li>
	   <li style="padding-left:50px;">  <span>
	   <a href="<?=base_url()?>user/autologin/<?=base64_encode($data[1]->id)?>"><?php echo $type2?></a>
	  </span>      </li>
  </ul>
  </div>
	
  <div style="width:45%; height:100%; float:right;">
  <ul style="margin:40px 40px;">
       <li>	
		<span >
	    <img src="<?php echo base_url()?>images/trainner_icon.png" />
	    </br>
		</span>		</li>
		<li style="padding-left:50px;">
  	    <span > 	
	    <a href="<?=base_url()?>user/autologin/<?=base64_encode($data[0]->id)?>"><?php echo $type?></a>		        </span>	    </li>
  </ul>		
  </div>	
</div>		</td>
            </tr>
          </table>
		<?php echo form_close(); ?> 
		  </td>
      </tr>
    </table>
  </div>


<script>
$().ready(function(){
	$("#fp").validate({
		rules: {
			
			
		},
		highlight: function(element) {
			$(element).closest('.err').removeClass('error').addClass('sucess');
		},
		success: function(element) {
			element
			.text('ok').addClass('sucess')
			.closest('.err').removeClass('error').addClass('success');
	   }
	});
	
	$("#close_x2").click(function() {
            parent.$.colorbox.close();
            return false;
    })
});
</script>