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
            <th>Subject</th>
            <th></th>
            <th></th>
            <th>Added date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="6"><div class="bulk-actions align-left">
                <select name="dropdown">
                  <option value="">Choose an action...</option>
                  <option value="activate">Activate</option>
				  <option value="deactivate">Deactivate</option>
                </select>
                <a class="button" href="#">Apply to selected</a> </div>
              <div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>
              <!-- End .pagination -->
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
          <?php if(is_array($lists) && count($lists)>0) {?>
		  <?php foreach($lists as $email){?>
		  <tr>
            <td><input type="checkbox" name="email[<?=$email->id?>]" /></td>
            <td><?php echo $email->subject;?></td>
            <td><?php //echo $email->template;?></td>
            <td></td>
            <td><?php echo date('d-M-Y',strtotime($email->added_date));?></td>
            <td><!-- Icons -->
              <a href="<?php echo site_url("admin/emails/edit").'/'.$email->id; ?>" title="Edit"><img src="<?php echo base_url('images/admin')?>/icons/pencil.png" alt="Edit" /></a> 
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
