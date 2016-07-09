<?php 
$success = $this->session->flashdata('success');
$error = $this->session->flashdata('error');

if($error != ''){	
?>
	<div class="error_msg" > 
			<a href="#" class="close_msg">
				<img src="<?php echo base_url("images/admin/icons/cross_grey_small.png");?>" />
			</a>
			<?php echo $error;?>
	</div>
<?php 
}

if($success != ''){	
?>	
	<div class="sucess_msg" >
			<a href="#" class="close_msg">
				<img src="<?php echo base_url("images/admin/icons/cross_grey_small.png");?>" />
			</a>
			<?php echo $success;?>
		 </div>
<?php
}

?>
