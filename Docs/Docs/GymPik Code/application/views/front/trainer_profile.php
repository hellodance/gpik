<div class="clear topPad40">&nbsp;</div>
<?php //echo '<pre>'; print_r($suggestion)?>
<div>
  <div class="pic" align="center">
         <img  width="150" src="<?php echo base_url().'profile_pic/'.$memberData->profile_pic;?>" />
  </div>
  <div class="info gympik_text" >			
		<a href="<?php echo base_url().'trainer/profile/'.$memberData->id?>" class="title">
			<?php echo $memberData->first_name.' '.$memberData->last_name;?>
		</a><br/> 						
		<?php echo $memberData->speciality.', '.$memberData->speciality2?></br>
		<?php echo $memberData->experience.' year experience ';?>
  </div>
  <div class="info gympik_text" style="float:right;"	>			
	<p style="color:#6ba700;"> Get in touch </p>
			<?php echo $memberData->email?></br>
			<?php echo $memberData->address?></br>
			<?php echo $memberData->mob_no?></br>
			<?php echo $memberData->fb_link?></br>
				
   </div>	
<img src="<?php echo base_url()?>images/line.png" width="100%" height="1" style="margin:10px 0px;"/>
</div>
<div class="info gympik_text">			
	<?php echo $memberData->certification;?></br>
	<?php echo $memberData->experience.' year experience ';?></br>
	<?php echo substr($memberData->description,0,150);?>
</div>

<div class="clear"></div>
<div class="gympik_text">
 <div class="title">Other Suggestion <img src="<?php echo base_url()?>images/line.png" width="100%" height="1" style="margin:10px 0px;"/></div>	
 <ul id="suggest">
<?php foreach($suggestion as $mem){?>
		<li>
			<div class="pic"><img  width="100" src="<?php echo base_url().'profile_pic/'.$mem->profile_pic;?>"></div>
			<div class="gympik_text" style="float:left; padding-top:10px;">
			<span class="title">	
				<a href="<?php echo base_url().'trainer/profile/'.$mem->id?>">
					<?php echo $mem->first_name.' '.$mem->last_name;?></a><br/>
			</span>
			<?php echo $mem->speciality;?></br>
			</div>
		</li> 
<?php }//end foreach ?>
 </ul>
<span class="gympik_text" style="float:right"><a href="#">View more</a></span>
</div>

<style>
#suggest li{ width:320px; min-height:110px; display:inline-block; border:0px solid red;}
</style>

