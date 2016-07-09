<div class="content-box">
  <!-- Start Content Box -->
  <div class="content-box-header">
    <h3 style="cursor: s-resize;"><?php echo isset($title) ? $title : "Admin "; ?></h3>
    <div class="clear"></div>
  </div>
  <!-- End .content-box-header -->
  <div class="content-box-content">
      <table>
        <thead>
          <tr>
            <th><input class="check-all" type="checkbox" /></th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Join date</th>
            <th>Actions</th>
			<th> </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="6"><div class="bulk-actions align-left">
                <select name="dropdown">
                  <option value="">Choose an action...</option>
                  <option value="activate">Activate</option>
				  <option value="deactivate">Deactivate</option>
                  <option value="option3">Delete</option>
                </select>
                <a class="button" href="#">Apply to selected</a> </div>
              <div class="pagination"> 
				  <?php echo $paging;?>
			  </div>
              <!-- End .pagination -->
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
          <?php if(is_array($lists) && count($lists)>0) {?>
		  <?php foreach($lists as $user){?>
		  <tr>
            <td><input type="checkbox" name="user[<?=$user->id?>]" /></td>
            <td><?php echo $user->first_name.' '.$user->last_name;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->role == 1 ? 'User' : 'Trainer';?></td>
            <td><?php echo date('d-M-Y',strtotime($user->join_date));?></td>
            <td><!-- Icons -->
              <a href="<?php echo site_url("admin/users/edit").'/'.$user->id; ?>" title="Edit"><img src="<?php echo base_url('images/admin')?>/icons/pencil.png" alt="Edit" /></a> 
			  <a href="<?php echo site_url("admin/users/status").'/'.$user->id.'/'.$user->status; ?>" title="status">
			  <img src="<?php echo base_url('images/admin')?>/icons/<?php echo $user->status == '1' ? 'act.png' : 'de-act.png'; ?>" height="15" />
			  </a>
			  
			  
			  
			  <a href="<?php echo site_url("admin/users/delete").'/'.$user->id; ?>" title="Delete"><img src="<?php echo base_url('images/admin')?>/icons/cross.png" alt="Delete" /></a>
			</td>
          </tr>
		  <?php }//endforeach?>
		  <?php }?>

        </tbody>
      </table>
    </div>
    <!-- End #tab1 -->
  </div>
</div>
