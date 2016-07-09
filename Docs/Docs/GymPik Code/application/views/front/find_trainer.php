<div id="trainer_up">
<table width="100%" border="0" cellspacing="16" cellpadding="0">
  <tr>
    <td align="left" valign="top">
<?php echo validation_errors(); ?>
<?php $attributes = array('class' => '', 'id' => 'reg','name'=>'reg','enctype'=>'multipart/form-data','method'=>'get'); ?>
<?php echo form_open('trainer/find' ,$attributes); ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center" valign="Top" class="popupTitle">Search Trainer
			<a href="#" id="close_x" class="close">
				<img src="<?php echo base_url()?>images/close-icon.png" width="20" height="20" alt="" />
			</a>
		</td>
      </tr>
      <tr>
        <td height="25" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top">
<img src="<?=base_url()?>images/tab.jpg"   width="277" height="38" id="img_01" usemap="#stepMap" />
<img src="<?=base_url()?>images/tab-2.jpg" width="277" height="38" id="img_02" usemap="#stepMap" style="display:none" />
<img src="<?=base_url()?>images/tab-3.jpg" width="277" height="38" id="img_03" usemap="#stepMap" style="display:none" />
		</td>
      </tr>
	  <tr>
	  	<td height="260" align="center">
			<!-- STEP - 01 -->
			<table width="95%" border="0" cellspacing="0" cellpadding="0" id="step_01" style="display:block;">
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="43" alt="" /></td>
			  </tr>
			  <tr>
				<td align="left" valign="top"><input class="search-fild err" placeholder="Address" type="text" name="add" id="add" /></td>
				<td align="right" valign="top"><input class="search-fild err" placeholder="Pincode" type="text" name="pincode" id="pincode" /></td>
			  </tr>
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="47" alt="" /></td>
				</tr>
			  <tr>
				<td align="left" valign="top"><input class="search-fild err" placeholder="City" type="text" name="city" id="city" /></td>
				<td align="right" valign="top"><input class="search-fild err" placeholder="Locality" type="text" name="locality" id="locality" /></td>
			  </tr>
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="47" alt=""/></td>
			  </tr>
			  <tr>
			  	<td colspan="2" align="center">
					<div style="position:relative; float:left;">
						<input type="button" class="next" name="01" id="01" value="" />
					</div>
				</td>
			  </tr>
			  
			</table>
			
			<!-- STEP - 02 -->
			<table width="95%" border="0" cellspacing="0" cellpadding="0" id="step_02" style="display:none;">
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="75" alt="" /></td>
			  </tr>
			  <tr>
				<td align="left" valign="top" style="padding-right:15px;">
					<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Trainer preference" name="gender[]" id="gender">                    <option value="">Trainer preference</option>
					<option value="1">Male</option>
					<option value="0">Female</option>
                </select>
                </div>
				</td>
				<td align="right" valign="top">
					<div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Trainer type" name="trainer_type[]" id="trainer_type">                    
					<option value="">Trainer type</option>
					<option value="Physical Trainer">Physical Trainer</option>
					<option value="Nutritionist/Dietician ">Nutritionist/Dietician</option>
					<option value="Physiotherapist ">Physiotherapist</option>
					<option value="Yoga Instructor ">Yoga Instructor</option>
					<option value="Aerobics">Aerobics</option>
					<option value="Martial Arts ">Martial Arts</option>

                </select>
                </div>
				</td>
			  </tr>
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="95" alt="" /></td>
				</tr>

			  <tr>
			  	<td colspan="2" align="center">
					<div style="position:relative; float:left;">
						<input type="button" class="next" name="02" id="02" value="" />
					</div>
				</td>
			  </tr>
			  
			</table>
			
			<!-- STEP - 03 -->
			<table width="95%" border="0" cellspacing="0" cellpadding="0" id="step_03" style="display:none;">
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="50" alt="" /></td>
			  </tr>
			  <tr>
				<td align="left" valign="middle">How often you need trainer</td>
				<td align="left" valign="top"><div class="dd">
             	<select style="z-index: 10; opacity: 0;" class="select err" title="Select one" name="schedule" id="schedule">                    <option value="everyday">Everyday</option>
					<option value="3 days a week ">3 days a week</option>
					<option value="4 times a month ">4 times a month</option>
                </select>
                </div></td>
			  </tr>
			  <tr>
					<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="50" alt="" /></td>
			  </tr>
			  <tr>
        		<td align="left" valign="top" colspan="2"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="54%" align="left" valign="middle">Do you need a dietician consult</td>
            <td width="5%" align="left" valign="middle"><input type="radio" name="diet" value="1" /></td>
            <td width="11%" align="left" valign="middle">Yes</td>
            <td width="4%" align="left" valign="middle"><input type="radio" name="diet" value="0" /></td>
            <td width="26%" align="left" valign="middle">No</td>
            
          </tr>
        </table></td>
     	 	  </tr>
			  <tr>
				<td colspan="2" align="left" valign="top">
					<img src="<?php echo base_url()?>images/spacer.png" width="12" height="50" alt="" /></td>
			  </tr>	
			  <tr>
			  	<td colspan="2">
					<div style="position:relative;float:left;">
						<input type="submit" class="submit" name="03" id="03" value="" />
					</div>
				</td>
			  </tr>
			  
			</table>
		</td>
	  </tr>
    </table>
<?php echo form_close(); ?>
	</td>
  </tr>
</table>
<map name="stepMap">
  <area shape="rect" coords="0,0,100,126"   id="01" class="searchStep" alt="ste1">
  <area shape="rect" coords="100,0,185,126" id="02" class="searchStep" alt="ste1">
  <area shape="rect" coords="186,0,277,126" id="03" class="searchStep" alt="ste1">
</map> 
</div>	
<script>
$().ready(function(){
	$("#close_x").click(function() {
            parent.$.colorbox.close();
            return false;
    })
	
	$('select.select').each(function(){
		var title = $(this).attr('title');
		if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
		$(this)
		.css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		.after('<span class="select">' + title + '</span>')
		.change(function(){
		val = $('option:selected',this).text();
		$(this).next().text(val);
		})
	});
	
	$('.next').click(function(){
		var curID = this.id;
		var nextID = parseInt(curID) + 1 ;
		
		$('#img_'+curID).hide();
		$('#img_0'+nextID).show();
		
		$('#step_'+curID).toggle('blind',500);
		$('#step_0'+nextID).toggle('blind',1000);
	})
	
	$('.searchStep').click(function(){
		var toOpen = this.id;
		
		if(toOpen == '01'){
			var toHide1 = '02';
			var toHide2 = '03';
		}else if(toOpen == '02'){
			var toHide1 = '01';
			var toHide2 = '03';
		}else{
			var toHide1 = '01';
			var toHide2 = '02';
		}
		
		$("#img_"+toHide1).hide();
		$("#img_"+toHide2).hide();
		$("#img_"+toOpen).show();
		
		$("#step_"+toHide1).hide();
		$("#step_"+toHide2).hide();
		$("#step_"+toOpen).toggle('blind',1000);
				
	})
	
});
</script>

