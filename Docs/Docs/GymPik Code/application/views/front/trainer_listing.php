<div class="clear topPad40">&nbsp;</div>

<!-- Search filter goes here  -->
<div id="LeftMenu3">
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data','method'=>'get'); ?>
	<?php echo form_open('trainer/find' ,$attributes); ?>
		<ul id="filter">
			<li class="heading">Search filter</li>
			<li><input type="text" class="inputTxt" name="add" id="add" placeholder="Address" value="<?php echo $old_post['add']?>"></li>
			<li><input type="text" class="inputTxt" name="city" id="city" placeholder="City" value="<?php echo $old_post['city']?>"></li>
			<li><input type="text" class="inputTxt" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $old_post['pincode']?>"></li>
<!--			<li>
				<select class="inputSelect" title="Trainer preference" name="gender" id="gender">
					<option value="">Trainer preference</option>
					<option value="1" <?php if($old_post['gender'] == '1'){echo 'selected';}?>>Male</option>
					<option value="0" <?php if($old_post['gender'] == '0'){echo 'selected';}?>>Female</option>
				</select>
			</li>-->
			
			<li>
				<div style="text-align:left"><strong>Trainer preference</strong></div>
				<div style="margin:5px; text-align:left; padding-left:20px; line-height:22px;">
					<input type="checkbox" name="gender[]" <? //if(in_array('1',$old_post['gender'])){ echo 'checked';}?> value="1" id="gender"> Male <br/>
					<input type="checkbox" name="gender[]" <? //if(in_array('0',$old_post['gender'])){ echo 'checked';}?> value="0" id="gender"> Female <br/>
				</div>
			</li>
			
			<li>
				<div style="text-align:left"><strong>Trainer type</strong></div>
				<div style="margin:5px; text-align:left; padding-left:20px; line-height:22px;">
				<?php $spclityArr = array('Physical Trainer','Nutritionist/Dietician','Physiotherapist', 'Yoga Instructor','Aerobics','Martial Arts')?>
					
					<?php foreach($spclityArr as $val):?>
					<input type="checkbox" name="trainer_type[]" value="<?=$val?>" <? if(in_array($val,$old_post['trainer_type'])){ echo 'checked';}?> > <?=$val?><br/>
					<?php endforeach;?>

				</div>
			</li>
			
			
<!--			<li>
				<select class="inputSelect" title="Trainer type" name="trainer_type" id="trainer_type">                    
					<option value="">Trainer type</option>
					<option value="Physical Trainer" <?php if($old_post['trainer_type'] == 'Physical Trainer'){echo 'selected';}?>>Physical Trainer</option>
					<option value="Nutritionist/Dietician" <?php if($old_post['trainer_type'] == 'Nutritionist/Dietician'){echo 'selected';}?>>Nutritionist/Dietician</option>
					<option value="Physiotherapist" <?php if($old_post['trainer_type'] == 'Physiotherapist'){echo 'selected';}?>>Physiotherapist</option>
					<option value="Yoga Instructor" <?php if($old_post['trainer_type'] == 'Yoga Instructor'){echo 'selected';}?>>Yoga Instructor</option>
					<option value="Aerobics" <?php if($old_post['trainer_type'] == 'Aerobics'){echo 'selected';}?>>Aerobics</option>
					<option value="Martial Arts" <?php if($old_post['trainer_type'] == 'Martial Arts'){echo 'selected';}?>>Martial Arts</option>
				</select>
			</li>-->
			<li style="text-align:left;"><input type="submit" name="submt" id="submt" value="Search" class="sign-btn"></li>
		</ul>
	<?php echo form_close(); ?>
</div>

<!-- Listing goes here  -->
<div id="txtContainer3">
<div class="heading">Trainer Listing</div>
<div id="load"><img src="<?php echo base_url()?>images/load1.gif"></div>
<ul id="list" style="display:none;">
	<?php if(is_array($listing) && count($listing) >0 ){?>
		<?php foreach($listing as $member){?>
		<li>
			<div class="pic" align="center">
				<img  width="150" src="<?php echo base_url().'profile_pic/'.$member->profile_pic;?>">
			</div>
			
			<div class="info gympik_text">
			<span class="title">	
				<a href="<?php echo base_url().'trainer/profile/'.$member->id?>"><?php echo $member->first_name.' '.$member->last_name;?></a><br/></span>
				<?php echo $member->speciality.', '.$member->speciality2?></br>
				<?php echo $member->certification;?></br>
				<?php echo $member->experience.' year experience ';?></br>
				<?php echo substr($member->description,0,150);?>
				
			</div>
			
			<div class="add gympik_text">
				<?php echo $member->address;?><br />
				<?php echo $member->pincode;?><br />
				<?php echo  $member->fb_link;?></br></br>
				<span class="follow"> Contact me </span>
			</div>
		</li>
		<?php }#endforeach?>
	<?php }else{ echo '<div id="empty_result">NO RESULT FOUND</div>';}?>
</ul>
<div class="pagination" style="display:none;"><?php echo $paging?></div>
</div>


<script>
$(document).ready(function(){
//   $('.inputSelect').change(function(){
//       $('#submt').click();
//   });
//   
//   $('.inputTxt').blur(function(){
//       $('#submt').click();
//   });
   
	setTimeout('showHTML()',1000);
});

function showHTML(){
	$('#load').hide();
    $('#list').toggle('slide',1000);
	$('.pagination').show();
	return false;
}





</script>