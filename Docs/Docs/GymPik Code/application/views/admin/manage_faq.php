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
            <th>FAQ</th>
            <th></th>
            <th>Create date</th>
            <th>Modify date</th>
            <th>EDIT</th>
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
		  <?php foreach($lists as $faq){?>
		  <tr>
            <td><input type="checkbox" name="faq[<?=$faq->id?>]" /></td>
            <td><?php echo $faq->faq;?></td>
			<td><?php // echo $faq->faq_ans;?></td>
            <td><?php echo date('d-M-Y',strtotime($faq->create_date));?></td>
            <td><?php echo date('d-M-Y',strtotime($faq->modify_date));?></td>
            <td><!-- Icons -->
              
			  <a href="<?php echo site_url("admin/faqs/edit").'/'.$faq->id; ?>" title="Edit"><img src="<?php echo base_url('images/admin')?>/icons/pencil.png" alt="Edit" /></a> 
			  
			  <a href="<?php echo site_url("admin/faqs/status").'/'.$faq->id.'/'.$faq->status; ?>" title="status">
			  <img src="<?php echo base_url('images/admin')?>/icons/<?php echo $faq->status == '1' ? 'act.png' : 'de-act.png'; ?>" height="15" />
			  </a>
			  
			  <a href="<?php echo site_url("admin/faqs/delete").'/'.$faq->id; ?>" title="Delete"><img src="<?php echo base_url('images/admin')?>/icons/cross.png" alt="Delete" /></a>
			  
			
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
