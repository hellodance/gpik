<div class="clear topPad40"></div>
<?php $type 	= $data[0]->role == '1' ? 'user' : 'trainer';  ?>
<?php $type2 	= $data[1]->role == '1' ? 'user' : 'trainer';  ?>

	
	
	<div style="width:400px; padding-left:250px;">
	<h3>Please select user type</h3>
   <div style="width:45%; height:100%;float:left;">
   <ul style="margin:40px 40px;">
	   <li>
	   <span>
	   <img src="<?php echo base_url()?>images/user_icon.png" />
	   </br>  
	   </span>
	   </li>
	   <li style="padding-left:50px;">  <span>
	   <a href="<?=base_url()?>user/autologin/<?=base64_encode($data[1]->id)?>"><?php echo $type2?></a>
	  </span>	
      </li>
  </ul>
  </div>
	
  <div style="width:45%; height:100%; float:right;">
  <ul style="margin:40px 40px;">
       <li>	
		<span >
	    <img src="<?php echo base_url()?>images/trainner_icon.png" />
	    </br>
		</span>    
		</li>
		<li style="padding-left:50px;">
  	    <span > 	
	    <a href="<?=base_url()?>user/autologin/<?=base64_encode($data[0]->id)?>"><?php echo $type?></a>		        </span> 
	    </li>
  </ul>		
  </div>	
</div>

